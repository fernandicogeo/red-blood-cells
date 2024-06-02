@extends('dashboard.layout')

@section('title', 'Form Checklist Tablet Tambah Darah')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Checklist Tablet Tambah Darah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Form Checklist Tablet Tambah Darah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if ($isFinished)
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1">Form Menstruasi</button>
                @endif
                @if ($isNotFinishedMenstruation)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Tambah Data Menstruasi</button>
                @endif
                @if ($isNotFinishedNoMenstruation)
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal3">Tambah Data Tidak Menstruasi</button>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <h5>Tabel Menstruasi</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">Sedang menstruasi</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Hari menstruasi ke-</th>
                        <th scope="col">Frekuensi konsumsi tablet tambah darah</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($menstruations as $menstruation)
                        <tr>
                            <td>{{ $menstruation->menstruasi }}</td>
                            <td>{{ $menstruation->created_at->format('m') }}</td>
                            <td>{{ $menstruation->hari_menstruasi }}</td>
                            <td>{{ $menstruation->frekuensi_tablet }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <h5>Tabel Data Menstruasi</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">Hari ke-</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Apakah mengonsumsi tablet tambah darah?</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($recallMenstruations as $recallMenstruation)
                        <tr>
                            <td>{{ $recallMenstruation->hari }}</td>
                            <td>{{ $recallMenstruation->created_at->format('Y-m-d') }}</td>
                            <td>{{ $recallMenstruation->isKonsumsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($isNotFinishedMenstruation)
            <form method="post" action="{{ route('finish.menstruation') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{ $latestMenstruation ? $latestMenstruation->id : 'null' }}" name="menstruation_id">
              <button type="submit" class="btn btn-success">Selesai Recall</button>
            </form>
            @endif
        </div>
        <div class="row mt-3">
            <h5>Tabel Data Tidak Menstruasi</h5>
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                      <tr>
                        <th scope="col">Minggu ke-</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Apakah mengonsumsi tablet tambah darah?</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($recallNoMenstruations as $recallNoMenstruation)
                        <tr>
                            <td>{{ $recallNoMenstruation->minggu }}</td>
                            <td>{{ $recallNoMenstruation->created_at->format('Y-m-d') }}</td>
                            <td>{{ $recallNoMenstruation->isKonsumsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($isNotFinishedNoMenstruation)
            <form method="post" action="{{ route('finish.no.menstruation') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{ $latestMenstruation ? $latestMenstruation->id : 'null' }}" name="menstruation_id">
              <button type="submit" class="btn btn-success mb-5">Selesai Recall</button>
            </form>
            @endif
        </div>
      </div>
    </section>
  </div>

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Menstruasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('store.tambah.darah') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                <div class="form-group">
                    <label for="menstruasi">Apakah anda sedang menstruasi?</label>
                    <select class="form-control" id="menstruasi" name="menstruasi" required>
                        <option value="" {{ old('menstruasi') == '' ? 'selected' : '' }}>Pilih Jawaban</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                    @error('menstruasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" id="hari_menstruasi-group" style="display: none;">
                    <label for="hari_menstruasi" class="form-label @error('hari_menstruasi') is-invalid @enderror">Hari Menstruasi</label>
                    <input type="number" class="form-control" id="hari_menstruasi" name="hari_menstruasi" placeholder="Input Hari Menstruasi Ke-" value="{{ old('hari_menstruasi') }}">
                    @error('hari_menstruasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="frekuensi_tablet" id="frekuensi_tablet_label">Apakah anda mengonsumsi tablet tambah darah?</label>
                    <select class="form-control" id="frekuensi_tablet" name="frekuensi_tablet" required>
                        <option value="" {{ old('frekuensi_tablet') == '' ? 'selected' : '' }}>Pilih Jawaban</option>
                        <option id="option3" value="Ya">Ya</option>
                        <option id="option4" value="Tidak">Tidak</option>
                    </select>
                    @error('frekuensi_tablet')
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

<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Recall Menstruasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="{{ route('store.menstruation') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{ $latestMenstruation ? $latestMenstruation->id : 'null' }}" name="menstruation_id">
              <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
              <div class="form-group">
                  <label for="hari" class="form-label @error('hari') is-invalid @enderror">Hari Menstruasi Ke-</label>
                  <input type="number" class="form-control" id="hari" name="hari" placeholder="Input Hari Menstruasi Ke-" value="{{ old('hari') }}">
                  @error('hari')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="isKonsumsi">Apakah anda mengonsumsi tablet tambah darah?</label>
                  <select class="form-control" id="isKonsumsi" name="isKonsumsi" required>
                      <option value="" {{ old('isKonsumsi') == '' ? 'selected' : '' }}>Pilih Jawaban</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                  </select>
                  @error('isKonsumsi')
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

<!-- Modal 3 -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Recall Tidak Menstruasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="{{ route('store.no.menstruation') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{ $latestMenstruation ? $latestMenstruation->id : 'null' }}" name="menstruation_id">
              <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
              <div class="form-group">
                  <label for="minggu" class="form-label @error('minggu') is-invalid @enderror">Minggu Ke-</label>
                  <input type="number" class="form-control" id="minggu" name="minggu" placeholder="Input Minggu Ke-" value="{{ old('minggu') }}">
                  @error('minggu')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="isKonsumsi">Apakah anda mengonsumsi tablet tambah darah?</label>
                  <select class="form-control" id="isKonsumsi" name="isKonsumsi" required>
                      <option value="" {{ old('isKonsumsi') == '' ? 'selected' : '' }}>Pilih Jawaban</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                  </select>
                  @error('isKonsumsi')
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


  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menstruasiSelect = document.getElementById('menstruasi');
        const hariMenstruasiGroup = document.getElementById('hari_menstruasi-group');
        const hariMenstruasiInput = document.getElementById('hari_menstruasi');
        const frekuensiTabletLabel = document.getElementById('frekuensi_tablet_label');
        const frekuensiTabletSelect = document.getElementById('frekuensi_tablet');
        const option2 = document.getElementById('option2');
        const option3 = document.getElementById('option3');

        function toggleInputs() {
            if (menstruasiSelect.value === 'Ya') {
                hariMenstruasiGroup.style.display = 'block';
                hariMenstruasiInput.setAttribute('required', 'required');
                frekuensiTabletLabel.textContent = 'Apakah anda mengonsumsi tablet tambah darah?';
            } else {
                hariMenstruasiGroup.style.display = 'none';
                hariMenstruasiInput.value = '';
                hariMenstruasiInput.removeAttribute('required');
                frekuensiTabletLabel.textContent = 'Apakah anda konsumsi tablet tambah darah selama minggu ini?';
            }
        }

        menstruasiSelect.addEventListener('change', toggleInputs);

        // Call the function once to set the initial state based on the old value
        toggleInputs();
    });
</script>
@endsection

  