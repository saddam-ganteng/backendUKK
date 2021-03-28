<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tanggapan extends Model
{
    protected $primaryKey = 'id_tanggapan';

    protected $fillable = [
        'id_laporan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'
    ];

    public function laparan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
