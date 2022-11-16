@extends('layoutpetugas.master')
@section('content')
@include('layoutpetugas.navbar')
@include('layoutpetugas.sidebar')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halaman Profil</h3>
    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
    <div class="card-body">
        <form action="{{url('simpanprofilpetugas')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="form-group">
                <label for="">Nama :</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir :</label>
                <input type="text" class="form-control" name="tempat_lahir" value="{{$data->tempat_lahir}}">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir : </label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin : </label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="{{ $data->jenis_kelamin }}" selected>{{ $data->jenis_kelamin }}</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">No Hp : </label>
                <input type="text" class="form-control" name="no_hp" value="{{ $data->no_hp }}">
            </div>
            <div class="form-group">
                <label for="">Email : </label>
                <input type="text" class="form-control" name="email" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="">Ubah Password : </label>
                <input type="password" class="form-control" name="password" placeholder="Kosongi jika tidak diubah">
            </div>

            <div class="form-group">
                <label for="">Alamat : </label>
                <textarea name="alamat" cols="5" rows="5" class="form-control">{{$data->alamat}}</textarea>
            </div>

            <div class="card-footer">
                <a href="" class="btn btn-warning float-left"> Kembali</a>
                <button type="submit" class="btn float-right btn-primary">Update Profil</button>
            </div>
        </form>
    </div>
</div>

@endsection