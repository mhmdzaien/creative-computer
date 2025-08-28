<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'service_request';

    protected $attributes = [
        'current_progress_id' => 0,
        'jenis_layanan' => '[]',
        'kelengkapan' => '[]'
    ];


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
        'progress_id',
        'kelengkapan',
        'jenis_layanan'
    ];

    protected function casts(): array
    {
        return [
            'kelengkapan' => 'array',
            'jenis_layanan' => 'array',
        ];
    }

    protected $keyType = 'uuid'; // Menyatakan tipe primary key menggunakan UUID

    /**
     * Generate nomor service dengan pola SRV + Tahun + Index (5 digit)
     * Contoh: SRV202400001, SRV202400002, dst.
     *
     * @return string
     */
    public static function generateNomorService()
    {
        $currentYear = date('Y');
        $prefix = 'SRV' . $currentYear;

        // Cari nomor terakhir untuk tahun ini
        $lastRecord = self::where('nomor', 'like', $prefix . '%')
            ->orderBy('nomor', 'desc')
            ->first();

        if ($lastRecord) {
            // Ambil 5 digit terakhir dari nomor dan increment
            $lastNumber = intval(substr($lastRecord->nomor, -5));
            $nextNumber = $lastNumber + 1;
        } else {
            // Jika belum ada record untuk tahun ini, mulai dari 1
            $nextNumber = 1;
        }

        // Format dengan leading zero 5 digit
        $formattedNumber = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        return $prefix . $formattedNumber;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->nomor)) {
                $model->nomor = static::generateNomorService();
            }
        });
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'progress_id');
    }

    public function currentProgress()
    {
        return $this->belongsTo(ServiceProgress::class, 'current_progress_id');
    }

    public function progress()
    {
        return $this->hasMany(ServiceProgress::class);
    }
}
