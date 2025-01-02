<?php

namespace App\Http\Controllers;

use App\Models\Dianjurkan;
use App\Models\Konsumsi;
use App\Models\Makanan;
use App\Models\Menstruation;
use App\Models\Penukar;
use App\Models\Recall;
use App\Models\RecallMenstruation;
use App\Models\RecallNoMenstruation;
use App\Models\TidakDianjurkan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $penukars = Penukar::all();
        return view('dashboard.index', compact('penukars'));
    }

    public function penukar()
    {
        $penukars = Penukar::all();
        return view('dashboard.penukar', compact('penukars'));
    }

    public function form()
    {
        $id = Auth::user()->id;
        $konsumsis = Konsumsi::where('user_id', $id)->with('makanan')->get();
        $makanans = Makanan::all();
        return view('dashboard.form', compact('id', 'konsumsis', 'makanans'));
    }

    public function store(Request $request)
    {
        // return ($request);
        $validatedData = $request->validate([
            'waktu_makan' => 'required',
            'makanan_id' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        $validatedData['user_id'] = $request->id;

        $konsumsi = Konsumsi::create($validatedData);

        $makanan = Makanan::where('id', $konsumsi->makanan_id)->first();

        $tanggal = $konsumsi->created_at->format('Y-m-d');

        $recall = Recall::where('user_id', $validatedData['user_id'])
            ->whereDate('tanggal', $tanggal)
            ->first();

        if ($recall) {
            $recall->total_energi += ($makanan->energi / 100) * $request->jumlah;
            $recall->total_protein += ($makanan->protein / 100) * $request->jumlah;
            $recall->total_lemak += ($makanan->lemak / 100) * $request->jumlah;
            $recall->total_kh += ($makanan->kh / 100) * $request->jumlah;
            $recall->total_fe += ($makanan->fe / 100) * $request->jumlah;
            $recall->save();
        } else {
            $recall = Recall::create([
                'user_id' => $validatedData['user_id'],
                'tanggal' => $tanggal,
                'total_energi' => ($makanan->energi / 100) * $request->jumlah,
                'total_protein' => ($makanan->protein / 100) * $request->jumlah,
                'total_lemak' => ($makanan->lemak / 100) * $request->jumlah,
                'total_kh' => ($makanan->kh / 100) * $request->jumlah,
                'total_fe' => ($makanan->fe / 100) * $request->jumlah,
            ]);
        }

        $kategoriEnergi = ($recall->total_energi < 1720) ? 'Kurang' : 'Baik';
        $kategoriProtein = ($recall->total_protein < 48) ? 'Kurang' : 'Baik';
        $kategoriLemak = ($recall->total_lemak < 56) ? 'Kurang' : 'Baik';
        $kategoriKh = ($recall->total_kh < 264) ? 'Kurang' : 'Baik';
        $kategoriFe = ($recall->total_fe < 15) ? 'Kurang' : 'Baik';

        $konsumsi->update([
            'recall_id' => $recall->id
        ]);

        $recall->update([
            'kategori_energi' => $kategoriEnergi,
            'kategori_protein' => $kategoriProtein,
            'kategori_lemak' => $kategoriLemak,
            'kategori_kh' => $kategoriKh,
            'kategori_fe' => $kategoriFe,
        ]);

        return redirect(route('form.recall'))->with('success', 'Anda berhasil menambahkan recall makan');
    }

    public function hasil()
    {
        $id = Auth::user()->id;
        $users = User::where('id', $id)->get();
        $recalls = Recall::where('user_id', $id)->get();
        return view('dashboard.hasil', compact('users', 'recalls'));
    }

    public function anjuran()
    {
        $dianjurkans = Dianjurkan::all();
        $tidak_dianjurkans = TidakDianjurkan::all();
        return view('dashboard.anjuran', compact('dianjurkans', 'tidak_dianjurkans'));
    }

    public function tambah_darah()
    {
        $latestMenstruation = Menstruation::where('user_id', Auth::user()->id)->latest()->first();

        $isFinished = false;
        $isNotFinishedMenstruation = false;
        $isNotFinishedNoMenstruation = null;

        if (is_null($latestMenstruation) || $latestMenstruation->isFinished == 1) $isFinished = true;
        if (!is_null($latestMenstruation) && $latestMenstruation->isFinished == 0 && $latestMenstruation->menstruasi == "Ya") $isNotFinishedMenstruation = true;
        if (!is_null($latestMenstruation) && $latestMenstruation->isFinished == 0 && $latestMenstruation->menstruasi == "Tidak") $isNotFinishedNoMenstruation = true;

        $menstruations = Menstruation::where('user_id', Auth::user()->id)->get();
        $recallMenstruations = RecallMenstruation::where('user_id', Auth::user()->id)->get();
        $recallNoMenstruations = RecallNoMenstruation::where('user_id', Auth::user()->id)->get();

        return view('dashboard.tambah-darah', compact('menstruations', 'recallMenstruations', 'recallNoMenstruations', 'isFinished', 'isNotFinishedMenstruation', 'latestMenstruation', 'isNotFinishedNoMenstruation'));
    }

    public function store_tambah_darah(Request $request)
    {
        // return ($request);
        $validatedData = $request->validate([
            'menstruasi' => 'required',
            'frekuensi_tablet' => 'required',
        ]);
        $validatedData['hari_menstruasi'] = $request->hari_menstruasi;
        $validatedData['user_id'] = $request->id;

        if ($validatedData['menstruasi'] == "Ya") $validatedData['isFinished'] = 0;
        if ($validatedData['menstruasi'] == "Tidak") $validatedData['isFinished'] = 0;

        $menstruation = Menstruation::create($validatedData);

        $bulan = $menstruation->created_at->format('m');

        $menstruation->update([
            'bulan' => $bulan
        ]);

        return redirect(route('form.tambah.darah'))->with('success', 'Anda berhasil menambahkan data tambah darah');
    }

    public function store_recall_menstruation(Request $request)
    {
        $validatedData = $request->validate([
            'hari' => 'required',
            'isKonsumsi' => 'required',
        ]);
        $validatedData['hari'] = $request->hari;
        $validatedData['user_id'] = $request->user_id;
        $validatedData['menstruation_id'] = $request->menstruation_id;

        $recallMenstruation = RecallMenstruation::create($validatedData);

        $tanggal = $recallMenstruation->created_at->format('Y-m-d');

        $recallMenstruation->update([
            'tanggal' => $tanggal
        ]);

        return redirect(route('form.tambah.darah'))->with('success', 'Anda berhasil menambahkan data recall menstruasi');
    }

    public function store_recall_no_menstruation(Request $request)
    {
        $validatedData = $request->validate([
            'minggu' => 'required',
            'isKonsumsi' => 'required',
        ]);
        $validatedData['minggu'] = $request->minggu;
        $validatedData['user_id'] = $request->user_id;
        $validatedData['menstruation_id'] = $request->menstruation_id;

        $recallNoMenstruation = RecallNoMenstruation::create($validatedData);

        $tanggal = $recallNoMenstruation->created_at->format('Y-m-d');

        $recallNoMenstruation->update([
            'tanggal' => $tanggal
        ]);

        return redirect(route('form.tambah.darah'))->with('success', 'Anda berhasil menambahkan data recall menstruasi');
    }

    public function finish_menstruation(Request $request)
    {
        $menstruation = Menstruation::where('id', $request->menstruation_id)->latest()->first();

        $menstruation->update([
            'isFinished' => 1
        ]);

        return redirect(route('form.tambah.darah'))->with('success', 'Anda menyelesaikan data recall menstruasi');
    }

    public function finish_no_menstruation(Request $request)
    {
        $menstruation = Menstruation::where('id', $request->menstruation_id)->latest()->first();

        $menstruation->update([
            'isFinished' => 1
        ]);

        return redirect(route('form.tambah.darah'))->with('success', 'Anda menyelesaikan data recall tidak menstruasi');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(route('home'));
    }
}
