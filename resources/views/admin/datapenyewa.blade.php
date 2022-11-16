@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">PENYEWA</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <hr>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tempat, Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Email</th>
          <th>No. HP</th>
          <th>Alamat</th>

        </tr>
      </thead>
      <tbody>
      @foreach($data as $i => $penyewa)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$penyewa->name}}</td>
          <td>{{$penyewa->tempat_lahir}}, {{$penyewa->tanggal_lahir}}</td>
          <td>{{$penyewa->jenis_kelamin}}</td>
          <td>{{$penyewa->email}}</td>
          <td>{{$penyewa->no_hp}}</td>
          <td>{{$penyewa->alamat}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>


@endsection