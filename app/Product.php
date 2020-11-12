<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 
    protected $fillable = [
        'name','sku','image','category','type','brand','stock','color','weight','ragular_price','discount_price','description','rate'
    ];
}
