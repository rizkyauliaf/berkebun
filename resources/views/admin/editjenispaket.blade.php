@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Jenis Paket</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{url('editpaket', ['id' => $paket->id_paket])}}" enctype="multipart/form-data" id="quickForm">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Paket</label>
                            <input type="text" name="nama_paket" class="form-control" value="{{$paket->nama_paket}}" id="nama_paket" placeholder="Jenis Paket">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <input type="text" name="deskripsi_paket" class="form-control" value="{{$paket->deskripsi_paket}}" id="deskripsi_paket" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Weekday</label>
                            <input type="text" name="harga_weekday" class="form-control" value="{{$paket->harga_weekday}}" id="harga_weekday" placeholder="Harga Weekday">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Weekend</label>
                            <input type="text" name="harga_weekend" class="form-control" value="{{$paket->harga_weekend}}" id="harga_weekend" placeholder="Harga Weekdend">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar</label>
                            <input class="form-control" name="gambar_paket" type="file" id="gambar_paket" required accept=".jpg,.png,.jpeg">
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection