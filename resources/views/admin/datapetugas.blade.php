@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">PETUGAS/ADMIN</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <a href="{{url('createpetugas')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Tambah</a>
    <hr>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No. HP</th>
          <th>Bidang Kerja</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $i => $petugas)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$petugas->name}}</td>
          <td>{{$petugas->email}}</td>
          <td>{{$petugas->no_hp}}</td>
          <td>{{$petugas->role}}</td>
          {{-- <td><img class="img-preview img-fluid" src="{{ url('/storage/'.$petugas->foto) }}" style="max-width: 180px;"></td> --}}
          <td>
            <a href="{{ url('/editpetugas', ['id' => $petugas->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <form action="{{ url('/destroypetugas',['id'=>$petugas->id]) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" ><i class="fas fa-eraser"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection