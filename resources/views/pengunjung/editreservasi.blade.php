@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbarlogin')

<!-- ======= Reservasi Section ======= -->
<section id="reservasi" class="reservasi sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>RESERVASI</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Reservasi</small></h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{url('reservasi/edit', ['id' => $data->id_reservasi])}}" enctype="multipart/form-data" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pesan">Nama Pemesan</label>
                                    <input type="text" name="nama_pesan" class="form-control" placeholder="Nama Pemesan" value="{{ $data->nama_pesan }}">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_pesan">Tanggal Pesan</label>
                                    <input type="date" name="tgl_pesan" class="form-control" id="tgl_pesan" placeholder="Tanggal Pesan" value="{{ $data->tgl_pesan }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_paket">Jenis Paket</label>
                                    <select class="form-control form-select" name="id_paket">
                                        <option disabled>Pilih...</option>
                                        @foreach ($paket as $pkt)
                                        <option value="{{ $pkt->id_paket }}" <?php if ($pkt->id_paket == $data->id_paket) {
                                            echo "selected";
                                        } ?>>{{ $pkt->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_promo">Promo</label>
                                    <select class="form-control form-select" name="id_promo">
                                        <option selected disabled>Pilih...</option>
                                        @foreach ($promo as $prom)
                                            <option value="{{ $prom->id_promo }}" <?php if ($prom->id_promo == $data->id_promo) {
                                                echo "selected";
                                            } ?>>
                                                {{ $prom->nama_promo }} (Rp. <?= number_format($prom->potongan, 0, ",",".") ?>)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_pesan">Jumlah Orang</label>
                                    <input type="number" name="jumlah_pesan" class="form-control" id="jumlah_pesan" placeholder="Jumlah Orang" value="{{ $data->jumlah_pesan }}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Reservasi</button>
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