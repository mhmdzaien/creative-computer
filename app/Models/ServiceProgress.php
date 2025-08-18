<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProgress extends Model
{
    use HasFactory;

    protected $fillable = ['service_request_id', 'status_id', 'catatan', 'teknisi_id', 'tanggal'];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
