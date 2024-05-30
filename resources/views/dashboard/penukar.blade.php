@extends('dashboard.layout')

@section('title', 'Bahan Penukar')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Bahan Penukar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Bahan Penukar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div style="overflow-x:auto;">
            <table class="table table-striped table-secondary">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Makanan</th>
                    <th scope="col">Bahan Makanan</th>
                    <th scope="col">Berat (gr)</th>
                    <th scope="col">URT</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($penukars as $penukar)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $penukar->jenis_makanan }}</td>
                        <td>{{ $penukar->bahan_makanan }}</td>
                        <td>{{ $penukar->berat }}</td>
                        <td>{{ $penukar->urt }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

  