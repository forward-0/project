<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart_Item extends Model
{
    use HasFactory;
    protected $keyType='string';
    protected $primaryKey ='item_id';
    public $incrementing = false;

    public static function boot()   {
        parent ::boot();
        static::creating(function($model){
            $model->item_id = Str::uuid();
        });
    }
    protected $fillable = [
        'item_id','cart_id','quantity','product_id'
    ];
}
