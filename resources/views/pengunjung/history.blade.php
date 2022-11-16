@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbarlogin')

<!-- ======= History Section ======= -->
<section id="history" class="history sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>HISTORY</h2>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">History Reservasi</h3>
            </div><!-- /.card-header -->

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Pesan</th>
                            <th>Jenis Paket</th>
                            <th>Promo</th>
                            <th>Jenis Hari</th>
                            <th>Jumlah Orang</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Alasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $reservasi)
                        <?php
                        $dayNum = date("w", strtotime($reservasi->tgl_pesan));
                        ?>
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$reservasi->nama_pesan}}</td>
                            <td>{{$reservasi->tgl_pesan}}</td>
                            <td>{{$reservasi->nama_paket}}</td>
                            <td>{{$reservasi->nama_promo}} (Rp. {{ number_format($reservasi->potongan, 0, ",",".")}})</td>
                            <td>
                                <?php
                                if ($dayNum == 0 || $dayNum == 6) {
                                    echo "Weekend (Rp. " . number_format($reservasi->weekend, 0, ",", ".") . ")";
                                } else {
                                    echo "Weekday (Rp. " . number_format($reservasi->weekday, 0, ",", ".") . ")";
                                }
                                ?>
                            </td>
                            <td>{{$reservasi->jumlah_pesan}}</td>
                            <td>Rp. <?= number_format($reservasi->total_bayar, 0, ",", ".") ?></td>
                            <td>{{$reservasi->status}}</td>
                            <td>{{$reservasi->alasan}}</td>
                            <td>
                                <?php
                                if ($reservasi->id_status == 1) { ?>
                                    <a href="{{ url('/reservasi', ['id' => $reservasi->id_reservasi]) }}" class="btn btn-warning">Edit</a>
                                <?php
                                } else if ($reservasi->id_status == 2) { ?>
                                    <a onclick="Konfirmasicetak('{{$reservasi->id_reservasi}}')" href="#" class="btn btn-info">Cetak</i></a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div>
    </div>
</section>
<!-- End History Section -->

@include('layoutpengunjung.footer')
@endsection
@section('js')

<script type="text/javascript">
    function Konfirmasicetak($id) {
        Swal.fire({
            title: 'Apakah Anda Yakin Akan Mencetak Data Ini?',
            // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location.href = "{{ url('pengunjungcetak') }}/" + $id;
            }
        })
    }
</script>
@endsection