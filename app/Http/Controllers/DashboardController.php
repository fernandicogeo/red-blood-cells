<?php

namespace App\Http\Controllers;

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

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(route('home'));
    }
}
