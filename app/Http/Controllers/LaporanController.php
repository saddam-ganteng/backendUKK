<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Masyarakat;
use App\Models\Laporan;
use App\Models\Kategori;
use App\Models\Tanggapan;

class LaporanController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $masyarakat = Masyarakat::all();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua Masyarakat',
            'data'    => $masyarakat
        ], 200);
    }

    public function GET_JAKARTA_LAPOR()
    {
        $count = Laporan::where('provinsi', 'Dki Jakarta')->count();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan DKI Jakarta',
            'data'    => $count
        ], 200);
    }

    public function GET_ACEH_LAPOR()
    {
        $count = Laporan::where('provinsi', 'Aceh')->count();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan di Bali',
            'data'    => $count
        ], 200);
    }

    public function GET_SULAWESI_LAPOR()
    {
        $count = Laporan::where('provinsi', 'Sulawesi Selatan')->count();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan Sulawesi',
            'data'    => $count
        ], 200);
    }

    public function GET_PAPUA_LAPOR()
    {
        $count = Laporan::where('provinsi', 'Papua')->count();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan Papua',
            'data'    => $count
        ], 200);
    }

    public function GET_BALI_LAPOR()
    {
        $count = Laporan::where('provinsi', 'Bali')->count();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan Bali',
            'data'    => $count
        ], 200);
    }

    public function GET_YOGYAKARTA_LAPOR()
    {
        $count = Laporan::where('provinsi', 'Di Yogyakarta')->count();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan DI Yogyakarta',
            'data'    => $count
        ], 200);
    }

    public function GET_lapor()
    {
        $laporan = Laporan::all();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua laporan',
            'data'    => $laporan
        ], 200);
    }

    public function GET_lapor_ID($id)
    {
        $laporan = Laporan::find($id);

        if ($laporan) {
            return response()->json([
                'code' => 200,
                'message'   => 'Detail laporan!',
                'data'      => $laporan
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'laporan Tidak Ditemukan!',
            ], 404);
        }
    }

    public function GET_lapor_NIK($nik)
    {
        $laporan = Laporan::where('nik', $nik)->get();

        if ($laporan) {
            return response()->json([
                'code' => 200,
                'message'   => 'laporan!',
                'data'      => $laporan
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Belum Membuat Laporan!',
            ], 404);
        }
    }

    public function POST_lapor(Request $request)
    {
        $this->validate($request, [
            'nik'   => 'required',
            'judul'   => 'required',
            'kategori'   => 'required',
            'provinsi'   => 'required',
            'kota'   => 'required',
            'kecamatan'   => 'required',
            'isi_laporan' => 'required|min:20'
        ]);
 
        $nik = $request->input("nik");
        $judul = $request->input("judul");
        $kategori = $request->input("kategori");
        $provinsi = $request->input("provinsi");
        $kota = $request->input("kota");
        $kecamatan = $request->input("kecamatan");
        $isi_laporan = $request->input("isi_laporan");
        $tanggal = Carbon::now();
 
        $data = [
            "tgl_laporan" => $tanggal->format('l, jS F Y'),
            "nik" => $nik,
            "judul" => $judul,
            "kategori" => $kategori,
            "provinsi" => $provinsi,
            "kota" => $kota,
            "kecamatan" => $kecamatan,
            "isi_laporan" => $isi_laporan,
            "foto" => $isi_laporan
        ];
 
        if (Laporan::create($data)) {
            $out = [
                "message" => "Laporan Berhasil!",
                "code"    => 200,
            ];
        } else {
            $out = [
                "message" => "Laporan Gagal!",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    public function DELETE_lapor($id)
    {
        $laporan = Laporan::where('id_laporan', $id)->first();
		
        if (!$laporan) {
            $out = [
                "message" => "laporan Gagal Berhasil Dihapus!",
                "code"    => 401,
            ];
            return response()->json($out, $out['code']);
        } else {
            $laporan->delete();
            $out = [
                "message" => "laporan Berhasil Dihapus!",
                "code"    => 200,
            ];
            return response()->json($out, $out['code']);
        }
    }

    public function DONE_lapor($id)
    {
        $laporan = Laporan::where('id_laporan', $id)->first();
		
        if (!$laporan) {
            $out = [
                "message" => "laporan Gagal DiUpdate!",
                "code"    => 401,
            ];
            return response()->json($out, $out['code']);
        } else {
            $laporan->update([
                'status' => "selesai"
            ]);
            $out = [
                "message" => "laporan Berhasil Dihapus!",
                "code"    => 200,
            ];
            return response()->json($out, $out['code']);
        }
    }

    public function GET_tanggapan($id_laporan)
    {
        $tanggapan = Tanggapan::where('id_laporan', $id_laporan)->get();

        if ($tanggapan) {
            return response()->json([
                'code' => 200,
                'message'   => 'tanggapan!',
                'data'      => $tanggapan
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Belum Membuat tanggapan!',
            ], 404);
        }
    }

    public function POST_tanggapan(Request $request)
    {
        $this->validate($request, [
            'id_laporan'   => 'required',
            'tanggapan'   => 'required',
            'id_petugas'   => 'required',
            'nama_petugas'   => 'required'
        ]);
 
        $id_laporan = $request->input("id_laporan");
        $tgl_tanggapan = Carbon::now();
        $tanggapan = $request->input("tanggapan");
        $id_petugas = $request->input("id_petugas");
        $nama_petugas = $request->input("nama_petugas");
 
        $data = [
            "id_laporan" => $id_laporan,
            "tgl_tanggapan" => $tgl_tanggapan->format('l, jS F Y'),
            "tanggapan" => $tanggapan,
            "id_petugas" => $id_petugas,
            "nama_petugas" => "asdasd",
        ];

        if (Tanggapan::create($data)) {
            $out = [
                "message" => "Tanggapan Berhasil!",
                "code"    => 200,
            ];
        } else {
            $out = [
                "message" => "Tanggapan Gagal!",
                "code"   => 404,
            ];
        }

        return response()->json($out, $out['code']);
    }

    public function POST_kategori(Request $request)
    {
        $this->validate($request, [
            'kategori'   => 'required'
        ]);
 
        $kategori = $request->input("kategori");
 
        $data = [
            "kategori" => $kategori
        ];
 
        if (Kategori::create($data)) {
            $out = [
                "message" => "Kategori Ditambahkan!",
                "code"    => 200,
            ];
        } else {
            $out = [
                "message" => "Kategori Gagal Ditambahkan!",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    public function PUT_kategori(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori'   => 'required'
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $kategori = Kategori::whereId($id)->update([
                'kategori'     => $request->input('kategori')
            ]);
    
            if ($kategori) {
                return response()->json([
                    'code' => 200,
                    'message' => 'Kategori Berhasil Diupdate!',
                    'data' => $kategori
                ], 201);
            } else {
                return response()->json([
                    'code' => 400,
                    'message' => 'Kategori Gagal Diupdate!',
                ], 400);
            }
        }
    }

    public function DELETE_kategori($id)
    {
        $kategori = Kategori::whereId($id)->first();
		
        if (!$kategori) {
            $out = [
                "message" => "Kategori Gagal Berhasil Dihapus!",
                "code"    => 401,
            ];
            return response()->json($out, $out['code']);
        } else {
            $kategori->delete();
            $out = [
                "message" => "Kategori Berhasil Dihapus!",
                "code"    => 200,
            ];
            return response()->json($out, $out['code']);
        }
    }

    public function GET_kategori()
    {
        $Kategori = Kategori::all();

        return response()->json([
            'code' => 200,
            'message' =>'List Semua Kategori',
            'data'    => $Kategori
        ], 200);
    }

    public function GET_kategori_ID($id)
    {
        $Kategori = Kategori::find($id);

        if ($Kategori) {
            return response()->json([
                'code' => 200,
                'message'   => 'Detail Kategori!',
                'data'      => $Kategori
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Kategori Tidak Ditemukan!',
            ], 404);
        }
    }

    
}
