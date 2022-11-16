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
                        <h3 class="card-title">Edit Petugas</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{url('editpromo', ['id' => $promo->id_promo])}}" enctype="multipart/form-data" id="quickForm">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Promo</label>
                                <input type="text" name="nama_promo" class="form-control" value="{{$promo->nama_promo}}" id="nama_promo" placeholder="Nama promo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <input type="text" name="deskripsi_promo" class="form-control" value="{{$promo->deskripsi_promo}}" id="eskripsi_promo" placeholder="Deskripsi Promo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Potongan</label>
                                <input type="text" name="potongan" class="form-control" value="{{$promo->potongan}}" id="potongan" placeholder="Potongan">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar</label>
                                <input class="form-control" name="gambar_promo" type="file" id="gambar_promo" required accept=".jpg,.png,.jpeg">
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