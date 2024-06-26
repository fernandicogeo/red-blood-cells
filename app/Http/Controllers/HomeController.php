<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['password']);
        $email = $request->email;

        // Check if the input is an email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (Auth::guard('web')->attempt(['email' => $email, 'password' => $credentials['password']])) {
                $request->session()->regenerate();
                return redirect(route('dashboard'))->with('success', 'Anda berhasil login');
            }
        }

        return back()->with('error', 'Email atau password anda salah!');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'umur' => 'required|integer|min:1|max:120',
            'berat_badan' => 'required|integer|min:1|max:300',
            'tinggi_badan' => 'required|integer|min:30|max:300',
            'password' => 'required|string',
        ]);


        $imt = $validatedData['berat_badan'] / (($validatedData['tinggi_badan'] / 100) * ($validatedData['tinggi_badan'] / 100));

        $kategori_imt = '';

        if ($imt < 17) $kategori_imt = "Kurus tingkat berat";
        else if ($imt >= 17 && $imt < 18.5) $kategori_imt = "Kurus tingkat ringan";
        else if ($imt >= 18.5 && $imt <= 25) $kategori_imt = "Normal";
        else if ($imt > 25 && $imt <= 27) $kategori_imt = "Gemuk ringan";
        else if ($imt > 27) $kategori_imt = "Gemuk berat";

        $validatedDataUser = [
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'umur' => $validatedData['umur'],
            'berat_badan' => $validatedData['berat_badan'],
            'tinggi_badan' => $validatedData['tinggi_badan'],
            'imt' => $imt,
            'kategori_imt' => $kategori_imt
        ];

        User::create($validatedDataUser);

        return redirect(route('login'))->with('success', 'Anda berhasil registrasi');
    }
}
