<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;
    protected $keyType='string';
    protected $primaryKey ='product_id';
    public $incrementing = false;

    public static function boot()   {
        parent ::boot();
        static::creating(function($model){
            $model->product_id = str::uuid();
        });
    }


    protected $fillable = [
        'product_name',
        'product_qty',
        'product_detail',
        'product_price',
        'product_image',
        'category_id',
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    public function cartItems()
    {
        return $this->hasMany(Cart_Item::class,
    'product_id','product_id');
    }

}
