@extends('layouts.mainApp')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Table</li>
            <li class="breadcrumb-item active">Tabel Akun Asisten</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

    @if(session('success'))
    {{-- <div class="alert alert-danger pe-3 mt-2">
        {{ session('success') }}
    </div> --}}
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel mt-2">
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                </div>
            </div>
        </div>
    @endif

<div class="container">
    <div class="row justify-content-center  ">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel mt-2">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title">Akun <span>Pasien</span></h4>
                        </div>
                        <div class="col-sm-9 col-xs-12 text-right">
                            <div class="btn_group">
                                <form method="get" action="/getasisten" id="search-form">  
                                    <input type="text" class="form-control" placeholder="Search" id="search" name="asisten" value="{{ Request('asisten') }}">
                                    <button type="submit" class="btn btn-default" title="Reload"><i class="fa fa-search"></i></button>
                                </form>        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Dibuat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($pegawai as $user)
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <ul class="action-list">
                                        <li>
                                            <form action="{{ route('deleteAkun', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fa fa-trash btn-danger"></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
