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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ubah Password</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="" enctype="multipart/form-data" id="quickForm">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="judul" class="form-control" value="" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" name="isi" class="form-control" value="" id="exampleInputPassword1" placeholder="Password">
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