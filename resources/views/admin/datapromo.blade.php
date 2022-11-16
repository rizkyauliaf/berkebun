@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">PROMO</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{url('createpromo')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Tambah</a>
        <hr>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Promo</th>
                    <th>Deskripsi</th>
                    <th>Potongan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($data as $i => $promo)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$promo->nama_promo}}</td>
                    <td>{{$promo->deskripsi_promo}}</td>
                    <td>{{$promo->potongan}}</td>
                    <td><img class="img-preview img-fluid" src="{{ url('/storage/'.$promo->gambar_promo) }}" style="max-width: 180px;"></td>
                    <td>
                        <a href="{{ url('/editpromo', ['id' => $promo->id_promo]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ url('/destroypromo',['id'=>$promo->id_promo]) }}" method="POST">
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