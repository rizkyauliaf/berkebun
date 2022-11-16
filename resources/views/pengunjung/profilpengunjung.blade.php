@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbarlogin')

<!-- ======= Reservasi Section ======= -->
<section id="reservasi" class="reservasi sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Profil</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="card-title">Data Profil</small></h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="/simpanprofilpengunjung" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="form-group">
                                    <label for="">Nama :</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir :</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir : </label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin : </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="{{ $data->jenis_kelamin }}" selected>{{ $data->jenis_kelamin }}</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
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
                                    <textarea name="alamat" cols="5" rows="5" class="form-control">{{ $data->alamat }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Profil</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
            </div>
            <!--/.col (right) -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
</section>
<!-- End Reservasi Section -->

@include('layoutpengunjung.footer')
@endsection