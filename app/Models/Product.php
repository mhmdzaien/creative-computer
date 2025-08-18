<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'id',
        'nama',
        'category_id',
        'brand_id',
        'harga',
        'is_active',
        'description',
        'stok',
        'image'
    ];

    protected $keyType = 'uuid'; // Menyatakan tipe primary key menggunakan UUID

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
