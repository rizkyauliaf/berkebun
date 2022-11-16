
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th, td {
          padding: 5px;
          text-align: left;
        }
        </style>
</head>
<body>
    <center>
        <h2>Cetak Reservasi</h2>
    </center>

    <h5>Detail Pemesanan</h5>
    <table style="width:100%">
      <tr>
        <th>Nama Pemesan </th>
        <td><b>{{$data->nama_pesan}}</b></td>
      </tr>
      <tr>
        <th>Tanggal Pesan </th>
        <td><b>{{$data->tgl_pesan}}</b></td>
      </tr>
      <tr>
        <th>Nama Paket</th>
        <td><b>{{$data->nama_paket}}</b></td>
      </tr>
      <tr>
        <th>Jumlah Pesan</th>
        <td><b>{{$data->jumlah_pesan}}</b></td>
      </tr>
      <tr>
        <th>Total Bayar</th>
        <td><b>Rp. {{number_format($data->total_bayar,2,".",",")}}</b></td>
      </tr>
    </table>
<center>
    <h5>Terimakasih Telah Menggunakan Layanan Kami</h5>
</center>
</body>
</html>