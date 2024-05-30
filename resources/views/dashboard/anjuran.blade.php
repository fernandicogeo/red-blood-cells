@extends('dashboard.layout')

@section('title', 'Anjuran Makanan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anjuran Makanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Anjuran Makanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-3">
            <h5>Tabel Makanan Dianjurkan</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sumber</th>
                        <th scope="col">Bahan Makanan</th>
                        <th scope="col">FE (mg)</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($dianjurkans as $dianjurkan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dianjurkan->sumber }}</td>
                            <td>{{ $dianjurkan->bahan_makanan }}</td>
                            <td>{{ $dianjurkan->fe }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
        <div class="row mt-3">
            <h5>Tabel Makanan Tidak Dianjurkan</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sumber</th>
                            <th scope="col">Bahan Makanan</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($tidak_dianjurkans as $tidak_dianjurkan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $tidak_dianjurkan->sumber }}</td>
                            <td>{{ $tidak_dianjurkan->bahan_makanan }}</td>
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

  