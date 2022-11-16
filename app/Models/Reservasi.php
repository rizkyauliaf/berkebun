<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = "reservasi";
    protected $primaryKey = 'id_reservasi';
    protected $fillable = [
        'id_promo',
        'id_status',
        'id_paket',
        'id_user',
        'nama_pesan',
        'tgl_pesan',
        'jumlah_pesan',
        'alasan',
        'total_bayar'
    ];

    public function getTglPesanAttribute($value)
    {
        $time = strtotime($value);
        $newFormat = date('Y-m-d', $time);
        return $newFormat;
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'id_promos');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
