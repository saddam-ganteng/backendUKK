<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Masyarakat;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $masyarakat = Masyarakat::all();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua Masyarakat',
            'data'    => $masyarakat
        ], 200);
    }

    public function lapor(Request $request)
    {
        $this->validate($request, [
            'judul'   => 'required',
            'isi_laporan' => 'required|min:20'
        ]);
 
        $judul = $request->input("judul");
        $isi_laporan = $request->input("isi_laporan");
        $tanggal = Carbon::now();
 
        $data = [
            "tgl_laporan" => $tanggal->format('l, jS F Y'),
            "nik" => "213123",
            "judul" => $judul,
            "isi_laporan" => $isi_laporan,
            "foto" => $isi_laporan,
            "status" => "proses",
        ];
 
        if (Laporan::create($data)) {
            $out = [
                "message" => "Laporan Berhasil!",
                "code"    => 201,
            ];
        } else {
            $out = [
                "message" => "Laporan Gagal!",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    
}
