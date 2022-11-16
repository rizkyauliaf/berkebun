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
                            <h3 class="card-title">Tambah Data Galeri</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('tambahgaleri') }}" enctype="multipart/form-data" id="quickForm">
                            @csrf
                            <div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Gambar</label>
                                    <input name="gambar_galeri" class="form-control" type="file" id="gambar_galeri" accept="image/*">
                                </div>
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
