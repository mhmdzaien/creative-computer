<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';


    protected $fillable = ['status'];

    public static $STATUS_SELESAI = 1;
    public static $STATUS_DITERIMA = 2;
    public static $STATUS_DALAM_PERBAIKAN = 3;
    public static $STATUS_PENDING = 4;
}
