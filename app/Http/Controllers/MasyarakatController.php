<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Masyarakat',
            'data'    => $masyarakat
        ], 200);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'nama'   => 'required',
            'username' => 'required|unique:masyarakats|max:255',
            'password' => 'required|min:6',
            'telp'   => 'required',
        ]);
 
        $nama = $request->input("nama");
        $username = $request->input("username");
        $password = $request->input("password");
        $telp = $request->input("telp");
 
        $hashPwd = Hash::make($password);
 
        $data = [
            "nama" => $nama,
            "username" => $username,
            "password" => $hashPwd,
            "telp" => $telp,
        ];
 
        if (Masyarakat::create($data)) {
            $out = [
                "message" => "Register Berhasil!",
                "code"    => 201,
            ];
        } else {
            $out = [
                "message" => "Register Gagal!",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
 
        $username = $request->input("username");
        $password = $request->input("password");
 
        $masyarakat = Masyarakat::where("username", $username)->first();
 
        if (!$masyarakat) {
            $out = [
                "message" => "Login Gagal, coba cek username dan password lagi!",
                "code"    => 401,
            ];
            return response()->json($out, $out['code']);
        }
 
        if (Hash::check($password, $masyarakat->password)) {
            $generateToken = bin2hex(random_bytes(40));
            $masyarakat->update([
                'token' => $generateToken
            ]);

            $out = [
                "message" => "Login Berhasil! ",
                "code"    => 200,
                'data'    => $masyarakat
            ];
        } else {
            $out = [
                "message" => "Login Gagal, coba cek username dan password lagi!",
                "code"    => 401,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

}