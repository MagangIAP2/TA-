<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";

    protected $fillable =[
        'product_id',
        'trx_date',
        'price'
    ];

    // link inner join ke table product
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class)->withDefault();
    }
}
