@extends('layout')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <div id="card-red-blood" class="card" style="width: 50rem; border: none; background-color: black;">
            <img src="/img/home.jpg" class="card-img-top" alt="Home">
            <div class="card-body d-flex justify-content-center">
              <a href="{{ route('login') }}" class="btn btn-danger px-5 py-2" style="background-color: var(--primary); border: none">Login</a>
            </div>
        </div>
    </div>
</div>

@endsection