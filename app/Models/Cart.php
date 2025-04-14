<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;
    
    protected $keyType='string';
    protected $primaryKey ='cart_id';
    public $incrementing = false;

    public static function boot()   {
        parent ::boot();
        static::creating(function($model){
            $model->cart_id = Str::uuid();
        });
    }
    protected $fillable = [
        'user_id'
    ];
}
