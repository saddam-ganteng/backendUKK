<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Petugas extends Model
{
    protected $table = 'petugass';

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'nama_petugas', 'username', 'password', 'telp', 'token' , 'level'
    ];

    // protected $hidden = [
    //     'password',
    // ];
}
