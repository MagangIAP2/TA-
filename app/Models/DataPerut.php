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
        'lingkar_perut_kanan', // Tinggi Fundus Uteri
        'lingkar_perut_atas',
        'minggu_ke',
        'lingkar_total' //Taksiran Berat Janin dalam gram
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User', 'user_id');
    }
}
