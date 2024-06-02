@extends('dashboard.layout')

@section('title', 'Hasil Food Record')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hasil Food Record</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Hasil Food Record</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-3">
            <h5>Tabel Biodata</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Umur</th>
                        <th scope="col">IMT</th>
                        <th scope="col">Kategori IMT</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->jenis_kelamin }}</td>
                            <td>{{ $user->umur }}</td>
                            <td>{{ $user->imt }}</td>
                            <td>{{ $user->kategori_imt }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
        <div class="row mt-3">
            <h5>Tabel Hasil Recall</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Energi (kkal)</th>
                        <th scope="col">Total Protein (gr)</th>
                        <th scope="col">Total Lemak (gr)</th>
                        <th scope="col">Total KH (gr)</th>
                        <th scope="col">Total FE (mg)</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($recalls as $recall)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $recall->created_at->format('Y-m-d') }}</td>
                            <td>{{ $recall->total_energi }} ({{ $recall->kategori_energi }})</td>
                            <td>{{ $recall->total_protein }} ({{ $recall->kategori_protein }})</td>
                            <td>{{ $recall->total_lemak }} ({{ $recall->kategori_lemak }})</td>
                            <td>{{ $recall->total_kh }} ({{ $recall->kategori_kh }})</td>
                            <td>{{ $recall->total_fe }} ({{ $recall->kategori_fe }})</td>
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

  