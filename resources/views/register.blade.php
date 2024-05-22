@extends('layout')

@section('title', 'Register')

@section('content')
<div class="p-5" id="home_page">
    <div class=" row page-title text-center mt-3">
        <h4 class="title wow">Register</h4>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <form class="mb-5 mt-5" action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Input Email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label @error('jenis_kelamin') is-invalid @enderror">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label @error('umur') is-invalid @enderror">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Input Umur" value="{{ old('umur') }}" required>
                    @error('umur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="berat_badan" class="form-label @error('berat_badan') is-invalid @enderror">Berat Badan (kg)</label>
                    <input type="number" class="form-control" id="berat_badan" name="berat_badan" placeholder="Input Berat Badan" value="{{ old('berat_badan') }}" required>
                    @error('berat_badan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tinggi_badan" class="form-label @error('tinggi_badan') is-invalid @enderror">Tinggi Badan (cm)</label>
                    <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="Input Tinggi Badan" value="{{ old('tinggi_badan') }}" required>
                    @error('tinggi_badan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Input Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>            
            <p>Sudah memiliki akun? Login <a href="{{ route('login') }}">disini.</a></p> 
        </div>
    </div>
</div>
@endsection