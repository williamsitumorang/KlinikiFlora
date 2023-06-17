@extends('layouts.mainApp')

@section('content')

  <!--breadcrumb-->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0">Dashboard</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Rekam Medis</li>
            <li class="breadcrumb-item active">Rekam Medis Pasien</li>
            <li class="breadcrumb-item active">Tambah</li>
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
                <div class="card-header shadow mb-3">{{ __('Tambahkan Medical Record') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mRecord.store') }}">
                        @csrf
                        @method('POST')

                        <input type="text" hidden name="idp" value="{{ $data->id }}">
                        {{-- <input type="text"  name="dop" value="{{ $datas->id }}"> --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pasien') }}</label>
                            <div class="col-md-6 mb-3">
                                <input type="text" name='name' value="{{ $data['name'] }}" placeholder="Nama Baru..." id="name" readonly class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-6 mb-3">
                                <input type="text" readonly name='gender' value="{{ $data['gender'] }}" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="phone_number" readonly type="text" name="phone_number" value="{{ $data['phone_number'] }}" placeholder="Nomor Baru..." class="form-control @error('phone_number') is-invalid @enderror">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="address" readonly type="text" value="{{ $data['address'] }}" name="address" placeholder="Alamat Baru..." class="form-control @error('address') is-invalid @enderror" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keluhan" class="col-md-4 col-form-label text-md-right">{{ __('Tinggi Badan') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="tinggi" placeholder="" type="number" class=" form-control @error('tinggi') is-invalid @enderror" name="tinggi" value="{{ old('tinggi') }}" autocomplete="tinggi">
                                @error('tinggi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keluhan" class="col-md-4 col-form-label text-md-right">{{ __('Berat Badan') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="berat" placeholder="" type="number" class=" form-control @error('berat') is-invalid @enderror" name="berat" value="{{ old('berat') }}" autocomplete="berat">
                                @error('berat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keluhan" class="col-md-4 col-form-label text-md-right">{{ __('Keluhan') }}</label>
                            <div class="col-md-6 mb-3">
                                <textarea id="keluhan" type="text" class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" value="{{ old('keterangan') }}" required autocomplete="keluhan"></textarea>
                                @error('keluhan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="diagnosa" class="col-md-4 col-form-label text-md-right">{{ __('Diagnosa') }}</label>
                            <div class="col-md-6 mb-3">
                                <textarea id="diagnosa" type="text" class="form-control @error('diagnosa') is-invalid @enderror" name="diagnosa" value="{{ old('diagnosa') }}" required autocomplete="diagnosa"></textarea>
                                @error('diagnosa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="obatSelect" class="col-md-4 col-form-label text-md-right">Pilih Obat:</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select id="obatSelect1" class="form-control select2 @error('obat') is-invalid @enderror" name="obat" required>
                                        <option selected disabled value="">Pilih obat</option>
                        
                                        @foreach($obat as $item)
                                            @if ($item->jumlah > 0)
                                                <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                            @else
                                                <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                            @endif
                                        @endforeach
                                    </select>
                        
                                    <input id="jumlah1" placeholder="jumlah obat" type="number" class="ml-3 form-control @error('jumlah') is-invalid @enderror" name="jumlah_dipakai" value="{{ old('jumlah') }}" required autocomplete="jumlah">
                                </div>
                                @error('diagnosa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="obatSelect2" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <a href="#" id="tambahObatLink" class="font-italic">Klik Disini</a>
                            </div>
                        </div>
                        
                        <div id="formObat" style="display: none;">
                            
                            <div class="form-group row">
                                <label for="obatSelect2" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select id="obatSelect2" class="form-control select2 @error('obat') is-invalid @enderror" name="obat2">
                                            <option selected disabled value="">Pilih obat</option>
                                            @foreach($obat as $item)
                                                @if ($item->jumlah > 0)
                                                    <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                                @else
                                                    <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <input id="jumlah2" placeholder="jumlah obat" type="number" class="ml-3 form-control @error('jumlah') is-invalid @enderror" name="jumlah_dipakai2" value="{{ old('jumlah') }}" autocomplete="jumlah">
                                    </div>
                                    
                                    @error('diagnosa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="obatSelect3" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select id="obatSelect3" class="form-control select2 @error('obat') is-invalid @enderror" name="obat3">
                                            <option selected disabled value="">Pilih obat</option>
                        
                                            @foreach($obat as $item)
                                                @if ($item->jumlah > 0)
                                                    <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                                @else
                                                    <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                                @endif
                                            @endforeach
                                        </select>
                        
                                        <input id="jumlah3" placeholder="jumlah obat" type="number" class="ml-3 form-control @error('jumlah') is-invalid @enderror" name="jumlah_dipakai3" value="{{ old('jumlah') }}" autocomplete="jumlah">
                                    </div>
                                    @error('diagnosa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="obatSelect" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select id="obatSelect4" class="form-control select2 @error('obat') is-invalid @enderror" name="obat4">
                                            <option selected disabled value="">Pilih obat</option>
                        
                                            @foreach($obat as $item)
                                                @if ($item->jumlah > 0)
                                                    <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                                @else
                                                    <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                                @endif
                                            @endforeach
                                        </select>
                        
                                        <input id="jumlah4" placeholder="jumlah obat" type="number" class="ml-3 form-control @error('jumlah') is-invalid @enderror" name="jumlah_dipakai4" value="{{ old('jumlah') }}" autocomplete="jumlah">
                                    </div>
                                    @error('diagnosa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="obatSelect" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select id="obatSelect5" class="form-control select2 @error('obat') is-invalid @enderror" name="obat5">
                                            <option selected disabled value="">Pilih obat</option>
                        
                                            @foreach($obat as $item)
                                                @if ($item->jumlah > 0)
                                                    <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                                @else
                                                    <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                                @endif
                                            @endforeach
                                        </select>
                        
                                        <input id="jumlah5" placeholder="jumlah obat" type="number" class="ml-3 form-control @error('jumlah') is-invalid @enderror" name="jumlah_dipakai5" value="{{ old('jumlah') }}" autocomplete="jumlah">
                                    </div>
                                    @error('diagnosa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            
                          </div>


                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                {{-- <button type="submit" class="btn btn-info" id="saveMedicine">
                                    {{ __('Tambahkan') }}
                                </button> --}}

                                <button type="submit" class="btn btn-success" id="saveData">
                                    {{ __('Simpan') }}
                                </button>

                                <div id="medicineList"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();

    // Tangkap perubahan pada input pencarian
    $('.select2').on('select2:open', function(e) {
        $(this).data('select2').dropdown.$search.attr('placeholder', 'Cari obat...');
    });
});
</script>

@section('scripts')
<script>
    $(document).ready(function() {
      $('.select2').select2();
  
      // Tangkap perubahan pada input pencarian
      $('.select2').on('select2:open', function(e) {
          $(this).data('select2').$dropdown.find('.select2-search__field').attr('placeholder', 'Cari obat...');
      });
  
      var formObat = document.getElementById("formObat");
      var tambahObatLink = document.getElementById("tambahObatLink");
      var isFormObatVisible = false;
  
      tambahObatLink.addEventListener("click", function() {
        if (isFormObatVisible) {
          formObat.style.display = "none";
          isFormObatVisible = false;
        } else {
          formObat.style.display = "block";
          isFormObatVisible = true;
        }
      });
    });
  </script>
@endsection

@endsection





{{-- <div class="form-group row">
    <label for="obat" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Obat') }}</label>
    <div class="col-md-6 mb-3">
        <a href="#" rel="tooltip" class="btn btn-info btn-sm col-md-8" data-toggle="modal" data-target="#exampleModal">
            <i>Lihat Selengkapnya...</i>
        </a>
        <div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="obatSelect" class="col-form-label col-md-4">Pilih Obat:</label>
                                <div class="col-md-6">
                                    <select id="obatSelect" class="form-control @error('obat') is-invalid @enderror" name="obat" required data-live-search="true">
                                        <option value="">Pilih Obat...</option>
                                        @foreach($obat as $item)
                                            @if ($item->jumlah > 0)
                                                <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                            @else
                                                <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah" class="col-form-label col-md-4">Masukkan Jumlah:</label>
                                <div class="col-md-6 input-group date">
                                    <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah_dipakai" value="{{ old('jumlah') }}" required autocomplete="jumlah">
                                    @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="addMedicineBtn">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}

                        {{-- <div class="form-group row">
                            <label for="diagnosa" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6 mb-3">
                                    <div id="medicineData" class="ml"></div>
                                </div>
                        </div> --}}

                                                        {{-- <select id="obatSelect" class="select2 form-control @error('obat') is-invalid @enderror" name="obat" required>
                                    <option value="">Pilih Obat...</option>
                                    @foreach($obat as $item)
                                        @if ($item->jumlah > 0)
                                            <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                        @else
                                            <option value="{{ $item->id }}" disabled>{{ $item->nama_obat }} (Habis)</option>
                                        @endif
                                    @endforeach
                                </select> --}}

