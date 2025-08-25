<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = ['id','value'];
    
    protected $keyType = 'string';

    public static $jsonSettings = [
        'kelengkapan',
        'jenis_layanan'
    ];

    public static function set($key,$value){
        $transformValue = $value;
        if(in_array($key,static::$jsonSettings)){
            $transformValue =json_encode($value);
        }
        return self::updateOrCreate(['id'=>$key],['value'=>$transformValue]);
    }

    public static function get($key){
        $item = static::find(['id'=>$key])->first();
        if(in_array($key,static::$jsonSettings)){
            return json_decode($item->value);
        }
        return $item->value;
    }
}
