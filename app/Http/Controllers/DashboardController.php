<?php

namespace App\Http\Controllers;

use App\Models\Dianjurkan;
use App\Models\Konsumsi;
use App\Models\Makanan;
use App\Models\Penukar;
use App\Models\Recall;
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

        $kategoriEnergi = ($recall->total_energi < 2100) ? 'Rendah' : 'Normal';
        $kategoriProtein = ($recall->total_protein < 65) ? 'Rendah' : 'Normal';
        $kategoriLemak = ($recall->total_lemak < 70) ? 'Rendah' : 'Normal';
        $kategoriKh = ($recall->total_kh < 300) ? 'Rendah' : 'Normal';
        $kategoriFe = ($recall->total_fe < 15) ? 'Rendah' : 'Normal';

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

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(route('home'));
    }
}
