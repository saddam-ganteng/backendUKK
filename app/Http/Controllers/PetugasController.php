<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function GET_petugas()
    {
        $masyarakat = Petugas::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Petugas',
            'data'    => $masyarakat
        ], 200);
    }

    public function POST_petugas(Request $request)
    {
        $this->validate($request, [
            'nama_petugas'   => 'required|unique:petugass',
            'username'   => 'required',
            'password'   => 'required',
            'telp'   => 'required',
            'level'   => 'required',
        ]);
 
        $nama_petugas = $request->input("nama_petugas");
        $username = $request->input("username");
        $password = $request->input("password");
        $telp = $request->input("telp");
        $level = $request->input("level");

        $hashPwd = Hash::make($password);
 
        $data = [
            "nama_petugas" => $nama_petugas,
            "username" => $username,
            "password" => $hashPwd,
            "telp" => $telp,
            "level" => $level
        ];
 
        if (Petugas::create($data)) {
            $out = [
                "message" => "Petugas Berhasil Ditambahkan!",
                "code"    => 200,
            ];
        } else {
            $out = [
                "message" => "Petugas Gagal! Ditambahkan",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    public function PUT_petugas(Request $request, $id)
    {
        $nama_petugas = $request->input("nama_petugas");
        $password = $request->input("password");
        $telp = $request->input("telp");
        $level = $request->input("level");
 
        $hashPwd = Hash::make($password);
 
        $data = [
            "nama_petugas" => $nama_petugas,
            "password" => $hashPwd,
            "telp" => $telp,
            "level" => $level,
        ];

        $petugas = Petugas::where('id_petugas', $id)->update($data);

        if ($petugas) {
            return response()->json([
                'code' => 200,
                'message' => 'Petugas Berhasil Diupdate!',
                'data' => $petugas
            ], 201);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'Petugas Gagal Diupdate!',
            ], 400);
        }
    }

    public function DELETE_petugas($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->first();
		
        if (!$petugas) {
            $out = [
                "message" => "Petugas Gagal Dihapus!",
                "code"    => 401,
            ];
            return response()->json($out, $out['code']);
        } else {
            $petugas->delete();
            $out = [
                "message" => "Petugas Berhasil Dihapus!",
                "code"    => 200,
            ];
            return response()->json($out, $out['code']);
        }
    }

}