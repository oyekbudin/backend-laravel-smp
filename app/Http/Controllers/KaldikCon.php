<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Beritas;
use App\Models\Kaldik;
use App\Models\Plang;
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

    public function plang()
    {
        $dataplang = Plang::orderBy('dibuat', 'desc')->get();

        return view('berandaplang', compact('dataplang'));
    }

    use Illuminate\Support\Str;

    public function tambahplang(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $uploadPath = base_path('../public_html/uploads/papan_nama');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $file = $request->file('gambar');

        // bikin slug dari nama
        $slug = Str::slug($request->nama);

        // ambil extension asli
        $extension = $file->getClientOriginalExtension();

        // filename dari nama
        $filename = $slug . '.' . $extension;

        // kalau file sudah ada, tambahkan angka biar tidak overwrite
        $counter = 1;
        while (file_exists($uploadPath . '/' . $filename)) {
            $filename = $slug . '-' . $counter . '.' . $extension;
            $counter++;
        }

        // upload file
        $file->move($uploadPath, $filename);

        Plang::create([
            'nama' => $request->nama,
            'gambar' => 'uploads/papan_nama/' . $filename,
            'halaman' => $request->halaman,
        ]);

        return redirect()->back()->with('success', 'Papan Nama berhasil ditambahkan!');
    }


    public function editplang($id)
    {
        $plang = Plang::findOrFail($id);
        return view('kaldik.editplang', compact('plang'));
    }

    public function destroyplang($id)
    {
        $plang = Plang::findOrFail($id);
        $plang->delete();
        return redirect()->back()->with('success', 'Papan Nama berhasil dihapus');
    }
    public function updateplang(Request $request, $id)
    {
        $plang = Plang::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'gambar' => 'required',


        ]);

        $plang->nama = $request->nama;
        $plang->gambar = $request->gambar;
        $plang->halaman = $request->halaman;




        $plang->save();

        return redirect()->back()->with('success', 'Papan Nama berhasil diperbarui!');
    }

}
