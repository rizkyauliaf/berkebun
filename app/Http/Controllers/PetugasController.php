<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;
use Hash;
use DataTables;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = DB::table('reservasi')->count();
        $masuk = DB::table('reservasi')->join('status', 'status.id_status', '=', 'reservasi.id_status')->where('status', 'Acc')->count();
        $selesai = DB::table('reservasi')->join('status', 'status.id_status', '=', 'reservasi.id_status')->where('status', 'Done')->count();
        $menunggu = DB::table('reservasi')->join('status', 'status.id_status', '=', 'reservasi.id_status')->where('status', 'Waiting')->count();


        $data = DB::select("SELECT SUM(total_bayar) as total, tgl_pesan , MONTHNAME(tgl_pesan) as bulan FROM reservasi GROUP BY MONTHNAME(tgl_pesan) ORDER BY(tgl_pesan)");
        $dataarray[] = ['bulan', 'total'];
        foreach ($data as $key => $val) {
            // $datanama[$i->nama] = $i->jumlah;
            $dataarray[++$key] = [$val->bulan, $val->total];
        }
        // dd($dataarray);
        return view('petugas/berandapetugas', compact('reservasi', 'masuk', 'selesai', 'menunggu', 'dataarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahreservasi()
    {
        return view('petugas/tambahreservasipetugas');
    }

    public function registersewa()
    {
        return view('petugas/registersewa');
    }

    public function reservasipetugas(Request $request)
    {
        //$data = Reservasi::all();

        if ($request->ajax()) {
            if (!empty($request->get('id_paket'))) {
                $data = DB::table('reservasi')
                    ->join('promo', 'reservasi.id_promo', '=', 'promo.id_promo')
                    ->join('status', 'reservasi.id_status', '=', 'status.id_status')
                    ->join('paket', 'reservasi.id_paket', '=', 'paket.id_paket')
                    ->select(
                        'reservasi.*',
                        'promo.nama_promo as nama_promo',
                        'status.id_status as id_status',
                        'status.status as status',
                        'paket.nama_paket as nama_paket',
                        'paket.harga_weekday as weekday',
                        'paket.harga_weekend as weekend'
                    )->where('reservasi.id_paket', $request->id_paket)->where('reservasi.id_status', 2)->get();
            } else {
                $data = DB::table('reservasi')
                    ->join('promo', 'reservasi.id_promo', '=', 'promo.id_promo')
                    ->join('status', 'reservasi.id_status', '=', 'status.id_status')
                    ->join('paket', 'reservasi.id_paket', '=', 'paket.id_paket')
                    ->select(
                        'reservasi.*',
                        'promo.nama_promo as nama_promo',
                        'status.id_status as id_status',
                        'status.status as status',
                        'paket.nama_paket as nama_paket',
                        'paket.harga_weekday as weekday',
                        'paket.harga_weekend as weekend'
                    )->where('reservasi.id_status', 2)->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<a href="detailreservasipetugas/' . $row->id_reservasi . '" class="btn btn-warning">Detail</i></a>
                    <a onclick="Konfirmasicetak(' . $row->id_reservasi . ')" href="#" class="btn btn-info">Cetak</i></a>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        $paket = DB::table('paket')->get();

        return view('petugas/datareservasipetugas', ['paket' => $paket]);
    }
    public function detailreservasipetugas($id_reservasi)
    {
        $reservasi = Reservasi::where('id_reservasi', $id_reservasi)
            ->join('promo', 'reservasi.id_promo', '=', 'promo.id_promo')
            ->join('status', 'reservasi.id_status', '=', 'status.id_status')
            ->join('paket', 'reservasi.id_paket', '=', 'paket.id_paket')
            ->select(
                'reservasi.*',
                'promo.nama_promo as nama_promo',
                'status.id_status as id_status',
                'status.status as status',
                'paket.nama_paket as nama_paket',
                'paket.harga_weekday as weekday',
                'paket.harga_weekend as weekend'
            )->first();
        $dayNum = date("w", strtotime($reservasi->tgl_pesan));
        if ($dayNum == 0 || $dayNum == 6) {
            $reservasi->day_type = 'Weekend ' . $reservasi->weekend;
        } else {
            $reservasi->day_type = 'Weekday ' . $reservasi->weekday;
        }
        return view('petugas/detailreservasipetugas', ['reservasi' => $reservasi]);
    }
    public function carireservasiptg(Request $request)
    {
        // menangkap data pencarian
        $carireservasiptg = $request->carireservasiptg;


        $data = Reservasi::all('nama_pesan')
            ->where('nama_pesan', 'like', "%" . $carireservasiptg . "%");


        return view('petugas/datareservasipetugas', ['data' => $data]);
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
        //
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
    public function datalaporan()
    {
        return view('petugas/datalaporan');
    }

    public function profil($id)
    {
        $data = User::find($id);

        return view('petugas/profil', compact('data'));
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
        // dd($data);
        DB::table('reservasi')->where('id_reservasi', $data->id_reservasi)->update(['id_status' => 4]);
        $pdf = PDF::loadview('petugas.cetakreservasi', ['data' => $data]);
        return $pdf->stream();
    }
}
