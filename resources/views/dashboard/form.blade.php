@extends('dashboard.layout')

@section('title', 'Form Recall Makanan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Recall Makanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Form Recall Makanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            </div>
        </div>
        <div class="row mt-3">
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu Makan</th>
                        <th scope="col">Makanan</th>
                        <th scope="col">Jumlah (gr)</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsumsis as $konsumsi)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $konsumsi->created_at->format('Y-m-d') }}</td>
                            <td>{{ $konsumsi->waktu_makan }}</td>
                            <td>{{ $konsumsi->makanan->bahan_makanan }}</td>
                            <td>{{ $konsumsi->jumlah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Makanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('store.recall') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $id }}" name="id">
                <div class="form-group">
                  <label for="waktu_makan">Waktu Makan</label>
                  <select class="form-control" id="waktu_makan" name="waktu_makan" required>
                    <option value="" {{ old('waktu_makan') == '' ? 'selected' : '' }}>Pilih Waktu Makan</option>
                    <option value="Pagi" {{ old('waktu_makan') == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                    <option value="Siang" {{ old('waktu_makan') == 'Siang' ? 'selected' : '' }}>Siang</option>
                    <option value="Malam" {{ old('waktu_makan') == 'Malam' ? 'selected' : '' }}>Malam</option>
                    <option value="Snack Pagi" {{ old('waktu_makan') == 'Snack Pagi' ? 'selected' : '' }}>Snack Pagi</option>
                    <option value="Snack Sore" {{ old('waktu_makan') == 'Snack Sore' ? 'selected' : '' }}>Snack Sore</option>
                  </select>
                  @error('waktu_makan')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="makanan_id">Makanan</label>
                  <select class="form-control" id="makanan_id" name="makanan_id" required>
                    <option value="" {{ old('makanan_id') == '' ? 'selected' : '' }}>Pilih Makanan</option>
                    @foreach ($makanans as $makanan)
                        <option value="{{ $makanan->id }}" {{ old('makanan_id') == $makanan->bahan_makanan ? 'selected' : '' }}>{{ $makanan->bahan_makanan }}</option>
                    @endforeach
                  </select>
                  @error('makanan')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah" class="form-label @error('jumlah') is-invalid @enderror">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Input Berat Makanan (gr)" value="{{ old('jumlah') }}" required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

  