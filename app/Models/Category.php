<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory;
    protected $keyType='string';
    protected $primaryKey ='category_id';
    public $incrementing = false;

    public static function boot()   {
        parent ::boot();
        static::creating(function($model){
            $model->category_id = str::uuid();
        });
    }


    protected $fillable = [
        'title', 'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','category_id');
    }
}
