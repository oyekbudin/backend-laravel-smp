<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Siswas; 
use Illuminate\Http\Request;

class ApiSiswaCon extends BaseController
{

    // menampilkan semua siswa
    public function index()
    {
        $siswa = Siswas::all();

        return response()->json([
            'status' => 'success',
            'total' => $siswa->count(),
            'data' => $siswa
        ]);
    }
    
    public function tambahsiswa(Request $request)
{
    $siswa = Siswas::create([
        //'id'     => $request->id,
            'nama_siswa'    => $request->nama_siswa,
            'password' => bcrypt($request->password),
            'no_hp'    => $request->no_hp,
            'kelas'    => $request->kelas,
    ]);

    return response()->json($siswa);
}

}