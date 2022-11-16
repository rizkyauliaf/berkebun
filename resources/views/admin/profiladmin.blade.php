@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')
<!-- Profile Image -->
<div class="card-body">
<a href="/ubahpwadmin" class="btn btn-secondary"><i class="fa fa-plus-square-o"></i>Ubah Password</a>
</div>
<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('../../dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Admin</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right">Admin</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">admin@gmail.com</a>
                  </li>
                  <li class="list-group-item">
                    <b>No. HP</b> <a class="float-right">087676564968</a>
                  </li>
                </ul>

                <a href="/editprofiladmin" class="btn btn-primary btn-block"><b>Edit</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection