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
                            <h3 class="card-title">Detail Reservasi</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{url('updatereservasi', ['id' => $reservasi->id_reservasi])}}" enctype="multipart/form-data" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <tr>
                                    <td>Nama Pemesan</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->nama_pesan}}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Tanggal Pesan</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->tgl_pesan}}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Jenis Paket</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->nama_paket}}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Promo</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->nama_promo}}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Jenis Hari</td>
                                    <td width="1%">:</td>
                                    <td>{{ $reservasi->day_type }}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Jumlah Orang</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->jumlah_pesan}}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Total Bayar</td>
                                    <td width="1%">:</td>
                                    <td>{{ $reservasi->total_bayar }}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Status</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->status}}</td>
                                </tr>
                                <br>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-left">Status </label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="custom-select d-block mr-4" id="id_status" name="id_status" onchange="">
                                                <option value="2">ACC</option>
                                                <option value="3">Cancel</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alasan Ditolak</label>
                                    <input type="text" name="alasan" class="form-control" id="alasan" placeholder="Alasan">
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
