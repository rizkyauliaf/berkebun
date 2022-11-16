<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Paket;
use App\Models\Promo;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Hash;

class AdminController extends Controller
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
        //dd($array);


        return view('admin/berandaadmin', compact('reservasi', 'masuk', 'selesai', 'menunggu', 'dataarray'));
    }

    public function profiladmin()
    {
        return view('admin/profiladmin');
    }
    //petugas
    public function tampilpetugas()
    {
        $data = User::where('role', '=', "petugas")->orWhere('role', '=', "admin")->get();
        return view('admin/datapetugas', ['data' => $data]);
    }

    public function createpetugas()
    {
        return view('admin/tambahpetugas');
    }
    public function storepetugas(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'role' => 'required|string|max:255'
            // 'foto' => 'required|image|mimes:jpg,jpeg,png'
        ];

        // $file = $request->file('foto');
        // $image_name = $file->getClientOriginalName();

        // if ($file) {
        //     $image_name = $file->store('images', 'public');
        // }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'password' => Hash::make($request->input('password')),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'role' => $request->input('role'),
            // 'foto' => $image_name
        ]);

        return redirect('datapetugas')->with('success', 'Data Berhasil Disimpan');
    }

    public function editpetugas($id)
    {
        $petugas = User::find($id);
        return view('admin/editpetugas', compact('petugas'));
    }
    public function updatepetugas(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'no_hp' => 'required|string',
            'role' => 'required|string',
            // 'foto' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $petugas = User::find($id);
        // $file = $request->file('foto');
        // $foto = '';

        // if ($file) {
        //     $foto = $file->store('images', 'public');

        //     if (Storage::exists('public/' . $petugas->foto)) {
        //         Storage::delete('public/' . $petugas->foto);
        //     }
        // }

        // if (!empty($request->file('foto'))) {
        //    User::where('id_admin_petugas', $id)->update([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'no_hp' => $request->no_hp,
        //         'role' => $request->role,
        //         'foto' => $foto

        //     ]);
        // } else {
        //     User::where('id_admin_petugas', $id)->update([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'no_hp' => $request->no_hp,
        //         'role' => $request->role,
        //         'foto' => $foto

        //     ]);
        // }
        if (!empty($request->input('password'))) {
            User::where('id', $id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'password' => Hash::make($request->input('password')),
                'alamat' => $request->input('alamat'),
                'no_hp' => $request->input('no_hp'),
                'role' => $request->input('role'),

            ]);
        } else {
            User::where('id', $id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'no_hp' => $request->input('no_hp'),
                'role' => $request->input('role'),

            ]);
        }

        return redirect('datapetugas')->with('success', 'Data Berhasil Diubah');
    }
    public function destroypetugas($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    //paket
    public function tampilpaket()
    {
        $data = Paket::all();
        return view('admin/datajenispaket', ['data' => $data]);
    }

    public function createpaket()
    {
        return view('admin/tambahjenispaket');
    }
    public function storepaket(Request $request)
    {
        $rules = [
            'nama_paket' => 'required|string|max:255',
            'deskripsi_paket' => 'required|string|max:255',
            'harga_weekday' => 'required|string|max:255',
            'harga_weekend' => 'required|string|max:255',
            'gambar_paket' => 'required|image|mimes:jpg,jpeg,png'
        ];

        $file = $request->file('gambar_paket');
        $image_name = $file->getClientOriginalName();

        if ($file) {
            $image_name = $file->store('images', 'public');
        }

        Paket::create([
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi_paket' => $request->input('deskripsi_paket'),
            'harga_weekday' => $request->input('harga_weekday'),
            'harga_weekend' => $request->input('harga_weekend'),
            'gambar_paket' => $image_name
        ]);

        return redirect('datajenispaket')->with('success', 'Data Berhasil Disimpan');
    }

    public function editpaket($id)
    {
        $paket = Paket::find($id);
        return view('admin/editjenispaket', compact('paket'));
    }
    public function updatepaket(Request $request, $id)
    {
        $this->validate($request, [
            'nama_paket' => 'required|string',
            'deskripsi_paket' => 'required|string',
            'harga_weekday' => 'required|string',
            'harga_weekend' => 'required|string',
            'gambar_paket' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $paket = Paket::find($id);
        $file = $request->file('gambar_paket');
        $gambar_paket = '';

        if ($file) {
            $gambar_paket = $file->store('images', 'public');

            if (Storage::exists('public/' . $paket->gambar_paket)) {
                Storage::delete('public/' . $paket->gambar_paket);
            }
        }

        if (!empty($request->file('gambar_paket'))) {
            Paket::where('id_paket', $id)->update([
                'nama_paket' => $request->nama_paket,
                'deskripsi_paket' => $request->deskripsi_paket,
                'harga_weekday' => $request->harga_weekday,
                'harga_weekend' => $request->harga_weekend,
                'gambar_paket' => $gambar_paket

            ]);
        } else {
            Paket::where('id_paket', $id)->update([
                'nama_paket' => $request->nama_paket,
                'deskripsi_paket' => $request->deskripsi_paket,
                'harga_weekday' => $request->harga_weekday,
                'harga_weekend' => $request->harga_weekend,
                'gambar_paket' => $gambar_paket

            ]);
        }

        return redirect('datajenispaket')->with('success', 'Data Berhasil Diubah');
    }

    // public function destroypaket($id)
    // {
    //     Paket::where('id_paket', $id)->delete();
    //     return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    // }

    //promo
    public function tampilpromo()
    {
        $data = Promo::all();
        return view('admin/datapromo', ['data' => $data]);
    }
    public function createpromo()
    {
        return view('admin/tambahpromo');
    }
    public function storepromo(Request $request)
    {
        $rules = [
            'nama_promo' => 'required|string|max:255',
            'deskripsi_promo' => 'required|string|max:255',
            'potongan' => 'required|string|max:255',
            'gambar_promo' => 'required|image|mimes:jpg,jpeg,png'
        ];

        $file = $request->file('gambar_promo');
        $image_name = $file->getClientOriginalName();

        if ($file) {
            $image_name = $file->store('images', 'public');
        }

        Promo::create([
            'nama_promo' => $request->input('nama_promo'),
            'deskripsi_promo' => $request->input('deskripsi_promo'),
            'potongan' => $request->input('potongan'),
            'gambar_promo' => $image_name

        ]);

        return redirect('datapromo')->with('success', 'Data Berhasil Disimpan');
    }

    public function editpromo($id)
    {
        $promo = Promo::find($id);
        return view('admin/editpromo', compact('promo'));
    }
    public function updatepromo(Request $request, $id)
    {
        $this->validate($request, [
            'nama_promo' => 'required|string',
            'deskripsi_promo' => 'required|string',
            'potongan' => 'required|string',
            'gambar_promo' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $promo = Promo::find($id);
        $file = $request->file('gambar_promo');
        $gambar_promo = '';

        if ($file) {
            $gambar_promo = $file->store('images', 'public');

            if (Storage::exists('public/' . $promo->gambar_promo)) {
                Storage::delete('public/' . $promo->gambar_promo);
            }
        }

        if (!empty($request->file('gambar_promo'))) {
            Promo::where('id_promo', $id)->update([
                'nama_promo' => $request->nama_promo,
                'deskripsi_promo' => $request->deskripsi_promo,
                'potongan' => $request->potongan,
                'gambar_promo' => $gambar_promo

            ]);
        } else {
            Promo::where('id_promo', $id)->update([
                'nama_promo' => $request->nama_promo,
                'deskripsi_promo' => $request->deskripsi_promo,
                'potongan' => $request->potongan,
                'gambar_promo' => $gambar_promo

            ]);
        }

        return redirect('datapromo')->with('success', 'Data Berhasil Diubah');
    }

    public function destroypromo($id)
    {
        Promo::where('id_promo', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    //artikel
    public function tampilartikel()
    {
        $data = Artikel::all();
        return view('admin/dataartikel', ['data' => $data]);
    }

    public function createartikel()
    {
        return view('admin/tambahartikel');
    }
    public function storeartikel(Request $request)
    {
        $rules = [
            'judul' => 'required|string|max:255',
            'isi_artikel' => 'required|string|max:255',
            'gambar_artikel' => 'required|image|mimes:jpg,jpeg,png'
        ];

        $file = $request->file('gambar_artikel');
        $image_name = $file->getClientOriginalName();

        if ($file) {
            $image_name = $file->store('images', 'public');
        }

        Artikel::create([
            'judul' => $request->input('judul'),
            'isi_artikel' => $request->input('isi_artikel'),
            'gambar_artikel' => $image_name
        ]);

        return redirect('dataartikel')->with('success', 'Data Berhasil Disimpan');
    }

    public function editartikel($id)
    {
        $artikel = Artikel::find($id);
        return view('admin/editartikel', compact('artikel'));
    }
    public function updateartikel(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'isi_artikel' => 'required|string',
            'gambar_artikel' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $artikel = Artikel::find($id);
        $file = $request->file('gambar_artikel');
        $gambar_artikel = '';

        if ($file) {
            $gambar_artikel = $file->store('images', 'public');

            if (Storage::exists('public/' . $artikel->gambar_artikel)) {
                Storage::delete('public/' . $artikel->gambar_artikel);
            }
        }

        if (!empty($request->file('gambar_artikel'))) {
            Artikel::where('id_artikel', $id)->update([
                'judul' => $request->judul,
                'isi_artikel' => $request->isi_artikel,
                'gambar_artikel' => $gambar_artikel

            ]);
        } else {
            Artikel::where('id_artikel', $id)->update([
                'judul' => $request->judul,
                'isi_artikel' => $request->isi_artikel,
                'gambar_artikel' => $gambar_artikel

            ]);
        }

        return redirect('dataartikel')->with('success', 'Data Berhasil Diubah');
    }

    public function destroyartikel($id)
    {
        Artikel::where('id_artikel', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    //galeri
    public function tampilgaleri()
    {
        $data = Galeri::all();
        return view('admin/datagaleri', ['data' => $data]);
    }

    public function creategaleri()
    {
        return view('admin/tambahgaleri');
    }
    public function storegaleri(Request $request)
    {
        $rules = [
            'gambar_galeri' => 'required|image|mimes:jpg,jpeg,png'
        ];

        $file = $request->file('gambar_galeri');
        $image_name = $file->getClientOriginalName();

        if ($file) {
            $image_name = $file->store('images', 'public');
        }

        Galeri::create([
            'gambar_galeri' => $image_name
        ]);

        return redirect('datagaleri')->with('success', 'Data Berhasil Disimpan');
    }

    public function editgaleri($id)
    {
        $galeri = Galeri::find($id);
        return view('admin/editgaleri', compact('galeri'));
    }
    public function updategaleri(Request $request, $id)
    {
        $this->validate($request, [
            'gambar_galeri' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $galeri = Galeri::find($id);
        $file = $request->file('gambar_galeri');
        $gambar_galeri = '';

        if ($file) {
            $gambar_galeri = $file->store('images', 'public');

            if (Storage::exists('public/' . $galeri->gambar_galeri)) {
                Storage::delete('public/' . $galeri->gambar_galeri);
            }
        }

        if (!empty($request->file('gambar_galeri'))) {
            Galeri::where('id_galeri', $id)->update([
                'gambar_galeri' => $gambar_galeri

            ]);
        } else {
            Galeri::where('id_galeri', $id)->update([
                'gambar_galeri' => $gambar_galeri

            ]);
        }

        return redirect('datagaleri')->with('success', 'Data Berhasil Diubah');
    }

    public function destroygaleri($id)
    {
        Galeri::where('id_galeri', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    //resevasi
    public function reservasiadm(Request $request)
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
                    )->where('reservasi.id_paket', $request->id_paket)->get();
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
                    )->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<a href="detailreservasi/' . $row->id_reservasi . '" class="btn btn-warning"><i class="fas fa-file"></i></a>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        $paket = DB::table('paket')->get();

        return view('admin/datareservasiall', ['paket' => $paket]);
    }

    public function detailreservasi($id_reservasi)
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
        return view('admin/detailreservasi', ['reservasi' => $reservasi]);
    }

    public function updateReservasi(Request $request, $id_reservasi)
    {
        $request->validate([
            'id_status' => 'required',
        ]);
        $reservasi = Reservasi::find($id_reservasi);
        $state = false;
        if ($request->alasan != null || $request->alasan != "") {
            $state = $reservasi->update([
                'id_status' => $request->id_status,
                'alasan' => $request->alasan
            ]);
        } else {
            $state = $reservasi->update([
                'id_status' => $request->id_status
            ]);
        }

        if ($state) {
            return redirect('/datareservasiall');
        } else {
            return redirect('/detailreservasi/' . $id_reservasi);
        }
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;


        $data = Reservasi::all('nama_pesan')
            ->where('nama_pesan', 'like', "%" . $cari . "%");


        return view('admin/datareservasiall', ['data' => $data]);
    }
    //laporan
    public function laporan(Request $request)
    {
        // menangkap data laporan
        if ($request->ajax()) {
            if (!empty($request->get('tgl_awal')) || !empty($request->get('tgl_akhir'))) {
                $data = DB::table('reservasi')
                    ->join('paket', 'paket.id_paket', '=', 'reservasi.id_paket')
                    ->join('status', 'status.id_status', '=', 'reservasi.id_status')
                    ->whereBetween('tgl_pesan', [$request->tgl_awal, $request->tgl_akhir])
                    ->where('status', 'Done')
                    ->get();
            } else {
                $data = DB::table('reservasi')
                    ->join('paket', 'paket.id_paket', '=', 'reservasi.id_paket')
                    ->join('status', 'status.id_status', '=', 'reservasi.id_status')
                    ->where('status', 'Done')
                    ->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin/datalaporan');
    }

    //penyewa
    public function datapenyewa()
    {
        $data = User::where('role', '=', "pengunjung")->get();
        return view('admin/datapenyewa', ['data' => $data]);
    }
    public function datalaporan()
    {
        return view('admin/datalaporan');
    }

    public function store(Request $request)
    {
        //
    }


    public function editprofil()
    {
        return view('admin/editprofiladmin');
    }
    public function ubahpw()
    {
        return view('admin/ubahpwadmin');
    }

    public function profil($id)
    {
        $data = User::find($id);

        return view('admin/profil', compact('data'));
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
}
