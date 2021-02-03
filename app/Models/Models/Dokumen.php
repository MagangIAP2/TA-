<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = "dokumen";

    protected $fillable = [
        'user_id',
        'name', // Tinggi Fundus Uteri
        'dokumen',
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User', 'user_id');
    }
}
