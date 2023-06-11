@extends('layouts.mainAppAsisten')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0">Dashboard</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Pendataan</li>
            <li class="breadcrumb-item active">Tambah Data Obat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

        </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header shadow mb-3">{{ __('Tambahkan Data Obat') }}</div>

                <div class="card-body">
                    <form action="{{ route('obat.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Obat') }}</label>

                            <div class="col-md-6 mb-3">
                                <input id="nama_obat" type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" value="{{ old('nama_obat') }}" required autocomplete="name">

                                @error('nama_obat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan Obat') }}</label>

                            <div class="col-md-6 mb-3">
                                <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan">

                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_masuk" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Masuk Obat') }}</label>

                            <div class="col-md-6 mb-3 input-group date">
                                
                                <input id="tanggal_masuk" type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required autocomplete="tanggal_masuk">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Obat') }}</label>

                            <div class="col-md-6 mb-3 input-group date">
                                
                                <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required autocomplete="jumlah">

                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kemasan" class="col-md-4 col-form-label text-md-right">{{ __('Kemasan') }}</label>
                            <div class="col-md-6 mb-3">
                                <div class="input-group custom-dropdown">
                                    <select id="kemasan" class="form-control @error('kemasan') is-invalid @enderror" name="kemasan" required>
                                        <option selected disabled value="">Pilih Kemasan</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Sirop">Sirop</option>
                                        <option value="Hirup">Hirup</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="dropdown">
                                            <i class="fas fa-caret-down"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('kemasan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                <div class="form-group row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Tambahkan') }}
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
  </div>
  
@endsection