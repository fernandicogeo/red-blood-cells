@extends('dashboard.layout')

@section('title', 'Materi')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Materi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Materi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content mb-5">
      <div class="container-fluid">
        <div class="row">
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/1.png" class="d-block w-100" alt="Materi 1">
                  </div>
                  <div class="carousel-item">
                    <img src="img/2.png" class="d-block w-100" alt="Materi 2">
                  </div>
                  <div class="carousel-item">
                    <img src="img/3.png" class="d-block w-100" alt="Materi 3">
                  </div>
                  <div class="carousel-item">
                    <img src="img/4.png" class="d-block w-100" alt="Materi 4">
                  </div>
                  <div class="carousel-item">
                    <img src="img/5.png" class="d-block w-100" alt="Materi 5">
                  </div>
                  <div class="carousel-item">
                    <img src="img/6.png" class="d-block w-100" alt="Materi 6">
                  </div>
                  <div class="carousel-item">
                    <img src="img/7.png" class="d-block w-100" alt="Materi 7">
                  </div>
                  <div class="carousel-item">
                    <img src="img/8.png" class="d-block w-100" alt="Materi 8">
                  </div>
                  <div class="carousel-item">
                    <img src="img/9.png" class="d-block w-100" alt="Materi 9">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev" style="filter: invert(100%);">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next" style="filter: invert(100%);">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
      </div>
    </section>
  </div>
@endsection

  