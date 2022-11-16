<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Reservasi;
use App\Models\Status;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Hash;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengunjung/berandapengunjung');
    }

    public function jenispaket()
    {
        $prm = Promo::all();
        $pkt = Paket::all();
        return view('pengunjung/jenispaketpengunjung', ['prm' => $prm], ['pkt' => $pkt]);
    }

    public function galeri()
    {
        $data = Galeri::all();
        return view('pengunjung/galeripengunjung', ['data' => $data]);
    }

    public function artikel()
    {
        $data = Artikel::all();
        return view('pengunjung/artikelpengunjung', ['data' => $data]);
    }

    public function detailartikel($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        return view('pengunjung/detailartikel', ['artikel' => $artikel]);
    }

    public function beranda()
    {
        return view('pengunjung/berandapengunjunglgn');
    }

    public function jenispaketlgn()
    {
        $prm = Promo::all();
        $pkt = Paket::all();
        return view('pengunjung/jenispaketpengunjunglgn', ['prm' => $prm], ['pkt' => $pkt]);
    }

    public function galerilgn()
    {
        $data = Galeri::all();
        return view('pengunjung/galeripengunjunglgn', ['data' => $data]);
    }

    public function artikellgn()
    {
        $data = Artikel::all();
        return view('pengunjung/artikelpengunjunglgn', ['data' => $data]);
    }

    public function detailartikellgn($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        return view('pengunjung/detailartikellgn', ['artikel' => $artikel]);
    }

    public function reservasi()
    {
        $paket = Paket::all(); //mendapatkan data dari tabel paket
        $promo = Promo::all(); //mendapatkan data dari tabel promo
        $status = Status::all(); //mendapatkan data dari tabel status
        return view('pengunjung/reservasi', ['paket' => $paket, 'promo' => $promo, 'status' => $status]);
    }

    public function storereservasi(Request $request)
    {
        $request->validate([
            'nama_pesan' => 'required|string|max:25',
            'tgl_pesan' => 'required',
            'id_paket' => 'required',
            'id_promo' => 'required',
            'jumlah_pesan' => 'required|int|max:25'
        ]);

        $package = Paket::where('id_paket', $request->id_paket)->first();
        $promo = Promo::where('id_promo', $request->id_promo)->first();
        $total = 0;
        $dayNum = date("w", strtotime($request->tgl_pesan));
        if ($dayNum == 0 || $dayNum == 6) {
            $total = (int)$package->harga_weekend * $request->jumlah_pesan - (int) $promo->potongan;
        } else {
            $total = (int)$package->harga_weekday * $request->jumlah_pesan - (int) $promo->potongan;
        }

        Reservasi::create([
            'nama_pesan' => $request->nama_pesan,
            'tgl_pesan' => $request->tgl_pesan,
            'id_paket' => $request->id_paket,
            'id_promo' => $request->id_promo,
            'id_status' => 1,
            'id_user' => Auth::user()->id,
            'jumlah_pesan' => $request->jumlah_pesan,
            'total_bayar' => (string)$total
        ]);

        return redirect('history')->with('success', 'Data Berhasil Disimpan');
    }
    public function editreservasi($id)
    {
        $reservasi = Reservasi::where('id_reservasi', $id)
            ->join('paket', 'reservasi.id_paket', '=', 'paket.id_paket')
            ->select('*')->first();
        $promo = Promo::all();
        $paket = Paket::all();
        return view('pengunjung/editreservasi', ['data' => $reservasi, 'paket' => $paket, 'promo' => $promo]);
    }

    public function history()
    {
        $data = DB::table('reservasi')->where('id_user', Auth::user()->id)
            ->join('promo', 'reservasi.id_promo', '=', 'promo.id_promo')
            ->join('status', 'reservasi.id_status', '=', 'status.id_status')
            ->join('paket', 'reservasi.id_paket', '=', 'paket.id_paket')
            ->select(
                'reservasi.*',
                'promo.nama_promo as nama_promo',
                'promo.potongan as potongan',
                'status.id_status as id_status',
                'status.status as status',
                'paket.nama_paket as nama_paket',
                'paket.harga_weekday as weekday',
                'paket.harga_weekend as weekend'
            )->get();
        return view('pengunjung/history', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pesan' => 'required|string|max:25',
            'tgl_pesan' => 'required',
            'id_paket' => 'required',
            'id_promo' => 'required',
            'jumlah_pesan' => 'required|int|max:25'
        ]);

        $package = Paket::where('id_paket', $request->id_paket)->first();
        $promo = Promo::where('id_promo', $request->id_promo)->first();
        $total = 0;
        $dayNum = date("w", strtotime($request->tgl_pesan));
        if ($dayNum == 0 || $dayNum == 6) {
            $total = (int)$package->harga_weekend * $request->jumlah_pesan - (int) $promo->potongan;
        } else {
            $total = (int)$package->harga_weekday * $request->jumlah_pesan - (int) $promo->potongan;
        }

        Reservasi::where('id_reservasi', $id)->update([
            'nama_pesan' => $request->nama_pesan,
            'tgl_pesan' => $request->tgl_pesan,
            'id_paket' => $request->id_paket,
            'id_promo' => $request->id_promo,
            'jumlah_pesan' => $request->jumlah_pesan,
            'total_bayar' => (string)$total
        ]);

        return redirect('history')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profil($id)
    {
        $data = User::find($id);

        return view('pengunjung.profilpengunjung', compact('data'));
    }

    public function simpanprofil(Request $request)
    {
        if ($request->password == "") {
            DB::table('users')->where('id', $request->id)->update([
                'name'  => $request->name,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir'  => $request->tanggal_lahir,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'no_hp'  => $request->no_hp,
                'email'  => $request->email,
                'alamat'  => $request->alamat,
            ]);
        } else {
            DB::table('users')->where('id', $request->id)->update([
                'name'  => $request->name,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir'  => $request->tanggal_lahir,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'no_hp'  => $request->no_hp,
                'email'  => $request->email,
                'password'  => Hash::make($request->password),
                'alamat'  => $request->alamat,
            ]);
        }
        return redirect()->back();
    }

    public function cetak_reservasi($id)
    {
        $data = DB::table('reservasi')->join('paket', 'paket.id_paket', '=', 'reservasi.id_paket')->where('reservasi.id_reservasi', $id)->first();
        $pdf = PDF::loadview('petugas.cetakreservasi', ['data' => $data]);
        return $pdf->stream();
    }
}
