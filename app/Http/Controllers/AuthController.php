<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register_masyarakat(Request $request)
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

    public function login_masyarakat(Request $request)
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

    public function register_petugas(Request $request)
    {
        $this->validate($request, [
            'nama'   => 'required',
            'username' => 'required|unique:petugass|max:255',
            'password' => 'required|min:6',
            'telp'   => 'required',
            'level'   => 'required',
        ]);
 
        $nama = $request->input("nama");
        $username = $request->input("username");
        $password = $request->input("password");
        $telp = $request->input("telp");
        $level = $request->input("level");
 
        $hashPwd = Hash::make($password);
 
        $data = [
            "nama_petugas" => $nama,
            "username" => $username,
            "password" => $hashPwd,
            "telp" => $telp,
            "level" => $level,
        ];
 
        if (Petugas::create($data)) {
            $out = [
                "message" => "Register Berhasil!",
                "code"    => 200,
            ];
        } else {
            $out = [
                "message" => "Register Gagal!",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    public function login_petugas(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
 
        $username = $request->input("username");
        $password = $request->input("password");
 
        $petugas = Petugas::where("username", $username)->first();
 
        if (!$petugas) {
            $out = [
                "message" => "Login Gagal, coba cek username dan password lagi!",
                "code"    => 404,
            ];
            return response()->json($out, $out['code']);
        }

        if ($petugas) {
            if (Hash::check($password, $petugas->password)) {
                $generateToken = bin2hex(random_bytes(40));
                $petugas->update([
                    'token' => $generateToken
                ]);

                $out = [
                    "message" => "Login Berhasil! ",
                    "code"    => 200,
                    'data'    => $petugas['token']
                ];
            } else {
                $out = [
                    "message" => "Login Gagal, coba cek username dan passasdword lagi!",
                    "code"    => 404,
                ];
            }
        }
        return response()->json($out, $out['code']);
    }
    
}