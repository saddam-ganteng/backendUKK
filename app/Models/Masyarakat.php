<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Masyarakat extends Model
{
    protected $primaryKey = 'nik';

    protected $fillable = [
        'nama', 'username','password', 'telp', 'token'
    ];

    // protected $hidden = [
    //     'password',
    // ];
}
