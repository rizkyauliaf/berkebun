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
                            <h3 class="card-title">Tambah Data Artikel</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('tambahartikel') }}" enctype="multipart/form-data" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Isi Artikel</label>
                                    <input type="text" name="isi_artikel" class="form-control" id="isi_artikel" placeholder="Isi Artikel">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Gambar</label>
                                    <input name="gambar_artikel" class="form-control" type="file" id="gambar_artikel" accept="image/*">
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
