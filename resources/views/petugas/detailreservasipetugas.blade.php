@extends('layoutpetugas.master')
@section('content')
@include('layoutpetugas.navbar')
@include('layoutpetugas.sidebar')
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
                        <form method="post" action="{{url('detailreservasipetugas', ['id' => $reservasi->id_reservasi])}}" enctype="multipart/form-data" id="quickForm">
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
                                    <td>Alasan</td>
                                    <td width="1%">:</td>
                                    <td>{{$reservasi->alasan}}</td>
                                </tr>
                            </div>
                            <!-- /.card-body -->
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