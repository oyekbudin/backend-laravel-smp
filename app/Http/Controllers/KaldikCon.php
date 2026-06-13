<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Beritas;
use App\Models\Kaldik;
use App\Models\Pesan_kesan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\Request;



class KaldikCon extends BaseController
{
    public function index()
    {
        $datakaldik = Kaldik::orderBy('mulai', 'desc')->get();

        return view('berandakaldik', compact('datakaldik'));
    }
    /*
        public function katalog()
        {
            $databerita = Beritas::orderBy('tanggal_publish', 'desc')->get(); // Ambil semua data dari tabel Siswa
            return view('berita', compact('databerita')); // Kirim data ke view
        }
        public function home()
        {
            $databerita = Beritas::orderBy('tanggal_publish', 'desc')->get(); // Ambil semua data dari tabel Siswa
            $pesankesan = Pesan_kesan::orderBy('tanggal', 'desc')->get();
            return view('home', compact('databerita', 'pesankesan'));
        }

        public function show($slug)
        {
            $berita = Beritas::where('slug', $slug)->firstOrFail();

            $lainnya = Beritas::where('id_berita', '!=', $berita->id_berita)
                ->orderBy('tanggal_publish', 'desc') // 🔥 pakai ini
                ->take(10)
                ->get();

            return view('show', compact('berita', 'lainnya'));
        }

    */
    public function tambahkaldik(Request $request)
    {


        $request->validate([
            'agenda' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        Kaldik::create([
            'agenda' => $request->agenda,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);

        return redirect()->back()->with('success', 'Agenda berhasil ditambahkan!');
        
    }


    public function edit($id)
    {
        $kaldik = Kaldik::findOrFail($id);
        return view('kaldik.edit', compact('kaldik'));
    }

    public function destroy($id)
    {
        $kaldik = Kaldik::findOrFail($id);
        $kaldik->delete();
        return redirect()->back()->with('success', 'Agenda berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
        $kaldik = Kaldik::findOrFail($id);

        $request->validate([
            'agenda' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',

        ]);

        $kaldik->agenda = $request->agenda;
        $kaldik->mulai = $request->mulai;
        $kaldik->selesai = $request->selesai;




        $kaldik->save();

        return redirect()->back()->with('success', 'Agenda berhasil diperbarui!');
    }
   
}
