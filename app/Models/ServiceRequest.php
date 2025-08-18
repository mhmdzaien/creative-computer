<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $table = 'service_request';


    protected $fillable = [
        'id',
        'nomor',
        'pelanggan',
        'kontak_pelanggan',
        'barang',
        'category_id',
        'tanggal_masuk',
        'estimasi_selesai',
        'teknisi_id',
        'estimasi_biaya',
        'keluhan',
        'progress_id'
    ];

    protected $keyType = 'uuid'; // Menyatakan tipe primary key menggunakan UUID

    public function status()
    {
        return $this->belongsTo(Status::class, 'progress_id');
    }
}
