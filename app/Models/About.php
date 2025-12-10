<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tahun_berdiri',
        'alamat',
        'email',
        'telepon',
        'tentang',
    ];
}
