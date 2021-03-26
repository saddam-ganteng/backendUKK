<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Laporan extends Model
{
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
       'tgl_laporan', 'nik', 'judul', 'isi_laporan', 'kategori', 'provinsi', 'kota', 'kecamatan', 'foto', 'status'
    ];

    // protected $hidden = [
    //     'password',
    // ];
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
