<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'nim',
        'name',
        'gender',
        'domisili',
        'angkatan',
        'prodi',
        'fakultas',
    ];
}
