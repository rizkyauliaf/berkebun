@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">JENIS PAKET</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{url('createpaket')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Tambah</a>
        <hr>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Paket</th>
                    <th>Deskripsi</th>
                    <th>Harga Weekday</th>
                    <th>Harga Weekend</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $i => $paket)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$paket->nama_paket}}</td>
                    <td>{{$paket->deskripsi_paket}}</td>
                    <td>{{$paket->harga_weekday}}</td>
                    <td>{{$paket->harga_weekend}}</td>
                    <td><img class="img-preview img-fluid" src="{{ url('/storage/'.$paket->gambar_paket) }}" style="max-width: 180px;"></td>
                    <td>
                        <a href="{{ url('/editpaket', ['id' => $paket->id_paket]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <!-- <form action="{{ url('/destroypaket',['id'=>$paket->id_paket]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" ><i class="fas fa-eraser"></i></button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@endsection