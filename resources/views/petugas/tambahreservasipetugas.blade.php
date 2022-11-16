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
                        <h3 class="card-title">Tambah Promo</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('tambahpromo') }}" enctype="multipart/form-data" id="quickForm">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_promo">Nama</label>
                                <input type="text" name="nama_promo" class="form-control" id="nama_promo" placeholder="Nama Promo">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_promo">Tanggal Pesan</label>
                                <input type="text" name="deskripsi_promo" class="form-control" id="deskripsi_promo" placeholder="Deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="potongan">Jenis Paket</label>
                                <input type="text" name="potongan" class="form-control" id="potongan" placeholder="Potongan">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Status</label>
                                <input name="gambar_promo" class="form-control" type="file" id="gambar_promo" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Alasan</label>
                                <input name="gambar_promo" class="form-control" type="file" id="gambar_promo" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Aksi</label>
                                <input name="gambar_promo" class="form-control" type="file" id="gambar_promo" accept="image/*">
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