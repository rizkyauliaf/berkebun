@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Jenis Paket</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('tambahpaket') }}"   method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_paket">Jenis Paket</label>
                                <input type="text" name="nama_paket" class="form-control" id="nama_paket" placeholder="Jenis Paket">
                            </div>
                            
                            <div class="form-group">
                                <label for="deskripsi_paket">Deskripsi</label>
                                <input type="text" name="deskripsi_paket" class="form-control" id="deskripsi_paket" placeholder="Deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="harga_weekday">Harga Weekday</label>
                                <input type="text" name="harga_weekday" class="form-control" id="harga_weekday" placeholder="Harga Weekday">
                            </div>
                            <div class="form-group">
                                <label for="harga_weekend">Harga Weekend</label>
                                <input type="text" name="harga_weekend" class="form-control" id="harga_weekend" placeholder="Harga Weekend">
                            </div>
                            <div class="mb-3">
                                <label for="gambar_paket" class="form-label">Gambar</label>
                                <input name="gambar_paket" class="form-control" type="file" required accept=".jpg,.png,.jpeg">
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