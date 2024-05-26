<?php

namespace App\Http\Controllers;

use App\Models\Konsumsi;
use App\Models\Makanan;
use App\Models\Penukar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $penukars = Penukar::all();
        return view('dashboard.index', compact('penukars'));
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

        Konsumsi::create($validatedData);

        return redirect(route('form.recall'))->with('success', 'Anda berhasil menambahkan recall makan');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(route('home'));
    }
}
