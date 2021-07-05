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
        $petugas = Petugas::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Petugas',
            'data'    => $petugas
        ], 200);
    }

    public function GET_petugas_ID($token)
    {
        $petugas = Petugas::where('token', $token)->first();

        if ($petugas) {
            return response()->json([
                'code' => 200,
                'message'   => 'petugas',
                'data'      => $petugas
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'tidak ada petugas dengan id tersebut!',
            ], 404);
        }
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

    public function PUT_petugas(Request $request, $token)
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

        $petugas = Petugas::where('token', $token)->update($data);

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

    public function UPDATE_foto_petugas(Request $request, $id)
    {
        $this->validate($request, [
            'foto'   => 'required|image'
        ]);
 
        $foto = $request->file("foto");
 
        $data = [
            "foto" => $foto
        ];

        $petugas = Petugas::where('id_petugas', $id)->update($data);

        if ($petugas) {
            return response()->json([
                'code' => 200,
                'message' => 'Foto Petugas Berhasil Diupdate!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'Foto Petugas Gagal Diupdate!',
            ], 400);
        }
    }

    public function UPDATE_foto(Request $request, $token)
    {
        $id_petugas = Petugas::where('token', $token)->value('id_petugas');
        
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $uniq = "avatar_".$id_petugas."_".$name;
        $destinationPath = public_path('assets/images');
        $image->move($destinationPath, $uniq);

        $data = [
            "image" => $uniq
        ];

        $petugas = Petugas::where('token', $token)->update($data);

        if ($petugas) {
            return response()->json([
                'code' => 200,
                'message' => 'Foto Petugas Berhasil Diupdate!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'Foto Petugas Gagal Diupdate!',
            ], 400);
        }
    }

}