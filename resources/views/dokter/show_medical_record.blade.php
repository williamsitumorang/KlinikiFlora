@extends('layouts.mainApp')

@section('content')
<head>
    <link rel="stylesheet" href={{ asset('css/tabel_pasien.css')}}>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
</head>

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Tabel</li>
                <li class="breadcrumb-item active">Tabel Rekam Medis</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
    
    <div class="container">
        <div class="form-group pull-right">
            <input type="text" class="search form-control" placeholder="Search.....">
        </div>
    </div>  

    <div class="container">
        <div class="row">
            <div class="col-md-5">
    
        @if(session('success'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" >
                    <i class="fas fa-times-circle me-3">
                        {{ session('success') }}
                    </i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
            </div>
        </div>
    </div>

    <div class="container card">
        <div class="container mt-1">
            <p>showing <strong>{{ $pagination->firstItem() }} - {{ $pagination->lastItem() }} </strong> dari <strong> {{ $pagination->total() }} </strong>  item</p>
        </div>
    <span class="counter pull-right"></span>
    <table class="table table-hover table-bordered results table-sm">
      <thead>
        <tr class="table-info text-center" >
          <th>#</th>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Gender</th>
          <th scope="col">Nomor HP</th>
          <th scope="col">Address</th>
          <th scope="col">Nama Obat</th>
          <th scope="col">Jumlah Obat</th>
          <th scope="col">Action</th>
          {{-- <th scope="col">Action</th> --}}
        </tr>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($medical as $report)
        <tr >
            <th scope="row">{{ $report->id }}</th>
            <td>{{ $report->name }}</td>
            <td>{{ $report->gender }}</td>
            <td>{{ $report->phone_number }}</td>
            <td>{{ $report->address }}</td>
            <td>{{ $report->nama_obat }}</td>
            <td>
                <ol>
                    {{ $report->jumlah_dipakai }}</td>
                </ol>
            <td>
                <a href="#" rel="tooltip" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal{{ $report->id }}">
                    <i>Lihat Selengkapnya...</i>
                </a>

                <div class="modal fade text-left" id="exampleModal{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $report->name }} ({{ $report->id }}) </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Keluhan:</label>
                            <p id="recipient-name"> {{ $report->keluhan }} </p>
                            </div>
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">Diagnosa:</label>
                            <p id="recipient-name"> {{ $report->diagnosa }} </p>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

            </td>0
            
        {{-- <table class="table table-hover results table-sm">
        <thead>
          <tr class="table-info text-center" >
            <th>#</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Gender</th>
            <th scope="col">Nomor HP Masuk</th>
            <th scope="col">Address</th>
            <th scope="col">Jumlah Obat yang Dipakai</th>
            <th scope="col">Nama Obat</th>
          </tr>
          <tr class="warning no-result">
            <td colspan="4"><i class="fa fa-warning"></i> No result</td>
          </tr>
        </thead>
        <tbody class="text-center">
          @foreach ($medical as $obat)
          <tr >
              <th scope="row">{{ $obat->name }}</th>
              <td>{{ $obat->gender }}</td>
              <td>{{ $obat->phone_number }}</td>
              <td>{{ $obat->address }}</td>
              <td>{{ $obat->jumlah_dipakai }}</td>
              <td>{{ $obat->nama_obat }}</td>
             
            </tr>
            @endforeach
        </tbody>
      </table> --}}

            {{-- <td>
                <div class="btn-group" role="group">

                    <a href={{url('/obats/redirect', $obat->id)}}>
                    <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm mr-1" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                    </button>
                    </a>
                    
                    <form action="{{ route('delete.obat', $obat->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                </div>
            </td> --}}
          </tr>
          @endforeach
      </tbody>
    </table>

    <nav class="pagination mb-3 justify-content-end">
        <ul class="pagination btn btn-sm btn-info"> {{ $pagination->withQueryString()->links() }} </ul>
    </nav>

</div>
@endsection 
