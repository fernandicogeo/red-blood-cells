@extends('layout')

@section('title', 'Login')

@section('content')
<div class="p-5" id="home_page">
    <div class=" row page-title text-center mt-3">
        <h4 class="title wow">Login</h4>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <form class="mb-5 mt-5" action="{{ route('login.authenticate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p>Belum memiliki akun? Register <a href="{{ route('register') }}">disini.</a></p> 
        </div>
    </div>
</div>
@endsection