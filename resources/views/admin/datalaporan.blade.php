@extends('layoutadmin.master')
@section('content')
@include('layoutadmin.navbar')
@include('layoutadmin.sidebar')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">LAPORAN</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label for="">Tanggal Awal :</label>
                <input type="date" id="tgl_awal" name="tgl_awal" placeholder="Masukkan Tanggal Awal" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="">Tanggal Akhir :</label>
                <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="Masukkan Tanggal Akhir" class="form-control">
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary mt-4" id="btnFilter">FILTER</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pesan</th>
                        <th>Tanggal Pesan</th>
                        <th>Jenis Paket</th>
                        <th>Jumlah Orang</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(function() {

        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [
                'pdf'
            ],
            ajax: {
                url: "{{ url('laporan') }}",
                data: function(d) {
                    d.tgl_awal = $('#tgl_awal').val(),
                        d.tgl_akhir = $('#tgl_akhir').val()
                }
            },
            paginate: false,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_pesan',
                    name: 'nama_pesan'
                },
                {
                    data: 'tgl_pesan',
                    name: 'tgl_pesan'
                },
                {
                    data: 'nama_paket',
                    name: 'nama_paket'
                },
                {
                    data: 'jumlah_pesan',
                    name: 'jumlah_pesan'
                },
                {
                    data: 'total_bayar',
                    name: 'total_bayar'
                },
            ]
        });

        $('#btnFilter').click(function() {
            table.draw();
        });
    });
</script>
@endsection