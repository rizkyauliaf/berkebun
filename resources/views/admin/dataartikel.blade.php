@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DATA ARTIKEL</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{url('createartikel')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Tambah</a>
        <hr>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Artikel</th>
                    <th>Isi Artikel</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $i => $artikel)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$artikel->judul}}</td>
                    <td>{{$artikel->isi_artikel}}</td>
                    <td><img class="img-preview img-fluid" src="{{ url('/storage/'.$artikel->gambar_artikel) }}" style="max-width: 180px;"></td>
                    <td>
                        <a href="{{ url('/editartikel', ['id' => $artikel->id_artikel]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ url('/destroyartikel',['id'=>$artikel->id_artikel]) }}" method="POST">
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