<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerut extends Model
{
    use HasFactory;

    protected $table = 'data_perut';

    protected $fillable = [
        'user_id',
        'tfu', // Tinggi Fundus Uteri
        'x', // Nilai [ X ]
        'tbh', //Taksiran Berat Janin dalam gram
        'minggu_ke',
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User', 'user_id');
    }
}
