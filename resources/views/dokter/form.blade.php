@extends('layouts.mainApp')

@section('content')

<p>william</p>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/Fmedical.css')}}>
</head>
  
<div class="card">
    <div class="title" style="text-align: center;"> 
      <h3>
        Hasil Pemeriksaan Kesehatan<br/>
        (Medical Record)<br/>
        Data Pribadi
      </h3>
    </div>
    <table class="table table-light table-striped">
      <tbody>
        <tr>
          <th scope="row">Nama</th>
          <td>: Mark</td>
          <td>Otto</td>
          <td>: @mdo</td>
        </tr>
        <tr>
          <th scope="row">Jenis Kelamin</th>
          <td>: Jacob</td>
          <td>Thornton</td>
          <td>: @fat</td>
        </tr>
        <tr>
          <th scope="row">Tanggal Lahir</th>
          <td>: Jacob</td>
          <td>Thornton</td>
          <td>: @fat</td>
        </tr>
        <tr>
          <th scope="row">Tanggal Lahir</th>
          <td colspan="3">: Jacob</td>
        </tr>
        <tr>
          <th scope="row">Tanggal Lahir</th>
          <td colspan="3">: Jacob</td>
        </tr>
      </tbody>
    </table><br/>
    <div class="title" style="text-align: center;"> 
      <h3>
        ANAMNESA<br/>
      </h3>
    </div>
    <table class="table table-light table-striped">
      <tbody>
        <tr>
          <th scope="row">Riwayat</th>
          <td>Mark</td>
          <td>: Otto</td>
        </tr>
        <tr>
          <th scope="row" rowspan="4">Kesehatan</th>
          <td>Mark</td>
          <td>: Otto</td>
        </tr>
        <tr>
          <td>Mark</td>
          <td>: Otto</td>
        </tr>
        <tr>
          <td>Mark</td>
          <td>: Otto</td>
        </tr>
        <tr>
          <td>Mark</td>
          <td>: Otto</td>
        </tr>
        </tbody>
        </table><br/>
        <table class="table table-light table-striped">
          <tbody>
            <tr>
              <th scope="row" rowspan="3">Nama</th>
              <td>Mark</td>
              <td>: Otto</td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>: Otto</td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>: Otto</td>
            </tr>
            </tbody>
            </table><br/>
            <div class="title" style="text-align: center;"> 
              <h3>
                ANAMNESA<br/>
              </h3>
            </div>
            <table class="table table-light table-striped">
              <tbody>
                <tr>
                  <th scope="row" rowspan="6">Nama</th>
                  <td>Mark</td>
                  <td>: Otto</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>: Otto</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>: Otto</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>: Otto</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>: Otto</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>: Otto</td>
                </tr>
                </tbody>
                </table><br/>
                <table class="table table-light table-striped">
                  <tbody>
                    <tr>
                      <th scope="row">Sistem</th>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="6">Kardiovaskular</th>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    <tr>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    <tr>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    <tr>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    <tr>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    <tr>
                      <td>Mark</td>
                      <td>: Otto</td>
                    </tr>
                    </tbody>
                    </table><br/>
                    <table class="table table-light table-striped">
                      <tbody>
                        <tr>
                          <th scope="row">Sistem</th>
                          <td>Mark</td>
                          <td>: Otto</td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="4">Pernafasan</th>
                          <td>Mark</td>
                          <td>: Otto</td>
                        </tr>
                        <tr>
                          <td>Mark</td>
                          <td>: Otto</td>
                        </tr>
                        <tr>
                          <td>Mark</td>
                          <td>: Otto</td>
                        </tr>
                        <tr>
                          <td>Mark</td>
                          <td>: Otto</td>
                        </tr>
                        </tbody>
                        </table><br/>
                    
</div>
@endsection