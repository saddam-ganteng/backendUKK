<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

}