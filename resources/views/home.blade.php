@extends('layout')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <div id="card-red-blood" class="card" style="width: 50%;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</div>

@endsection