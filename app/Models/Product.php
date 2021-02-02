<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    // link inner join ke table category
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class)->withDefault();
        //return $this->belongsTo(\App\Models\Category::class, 'category_id',"id");
    }
}
