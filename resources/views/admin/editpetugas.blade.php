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
            <h3 class="card-title">Edit Petugas/Admin</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{url('updatepetugas', ['id' => $petugas->id])}}" enctype="multipart/form-data" id="quickForm">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" value="{{$petugas->name}}">
              </div>
              <div class="form-group">
                <label for="email">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                  <option value="{{$petugas->jenis_kelamin}}" selected>{{$petugas->jenis_kelamin}}</option>
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
              <div class="form-group">
                <label for="email">Tempat</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="{{$petugas->tempat_lahir}}">
              </div>
              <div class="form-group">
                <label for="email">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{$petugas->tanggal_lahir}}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$petugas->email}}">
              </div>
              <div class="form-group">
                <label for="email">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password Baru">
              </div>
              <div class="form-group">
                <label for="isi">No. HP</label>
                <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No. HP" value="{{$petugas->no_hp}}">
              </div>
              <div class="form-group">
                <label for="isi">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="{{$petugas->alamat}}">
              </div>
              <div class="form-group">
                <label for="role">Bidang Kerja</label>
                {{-- <input type="text" name="role" class="form-control" id="role" placeholder="Bidang Kerja"> --}}
                <select name="role" id="role" class="form-control">
                  <option value="{{$petugas->role}}">{{$petugas->role}}</option>
                  <option value="admin">admin</option>
                  <option value="petugas">petugas</option>
                </select>
              </div>
              {{-- <div class="mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <input name="foto" class="form-control" type="file"id="foto" accept="image/*">
              </div> --}}
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