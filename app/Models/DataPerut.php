<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerut extends Model
{
    use HasFactory;

    protected $table = 'data_perut';

    protected $fillable = [
        'lingkar_perut_kanan',
        'lingkar_perut_atas',
        'minggu_ke',
        'lingkar_total'
    ];
}
