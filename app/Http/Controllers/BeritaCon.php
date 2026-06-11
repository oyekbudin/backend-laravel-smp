<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Beritas;
use App\Models\Pesan_kesan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\Request;



class BeritaCon extends BaseController
{
    public function index()
    {
        $databerita = Beritas::orderBy('tanggal_publish', 'desc')->get();

        return view('berandaberita', compact('databerita'));
    }

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
            ->take(3)
            ->get();

        return view('show', compact('berita', 'lainnya'));
    }

    /*public function old2tambahberita(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'image' => 'required|image|max:51200',
        ]);

        try {
            $file = $request->file('image');

            // nama file unik
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // simpan ke storage/app/public/berita
            $path = $file->storeAs('berita', $filename, 'public');

            // simpan ke database
            \App\Models\Beritas::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'penulis' => $request->penulis,
                'gambar' => 'storage/' . $path,
            ]);

            return back()->with('success', 'Berhasil upload!');

        } catch (\Exception $e) {
            \Log::error('Upload error: ' . $e->getMessage());
            \Log::error($e);

            return back()->with('error', 'Upload gagal!');
        }
    }
    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json(['error' => 'no file'], 400);
        }

        $file = $request->file('upload');

        $filename = \Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = public_path('uploads/editor');

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        $file->move($path, $filename);

        return response()->json([
            'url' => asset('uploads/editor/' . $filename)
        ]);
    }*/
    public function tambahberita(Request $request)
    {
        try {


            // ✅ VALIDASI
            $request->validate([
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:51200',
            ]);

            // ✅ PENULIS
            $penulis = Auth::user()->nama_lengkap ?? 'Admin';

            // =========================
            // 🖼️ UPLOAD GAMBAR
            // =========================
            $path = null;

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');

                $uploadPath = base_path('../public_html/uploads/berita');

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }

                $filename = \Str::uuid() . '.' . $file->getClientOriginalExtension();

                // ✅ pakai move (normal)
                $file->move($uploadPath, $filename);

                $path = 'uploads/berita/' . $filename;
            }

            // =========================
            // 🔥 SLUG
            // =========================
            $baseSlug = \Str::slug($request->judul);
            $slug = $baseSlug;
            $counter = 1;

            while (\App\Models\Beritas::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // =========================
            // 💾 SIMPAN
            // =========================
            \App\Models\Beritas::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'penulis' => $penulis,
                'gambar' => $path,
                'thumbnail' => $path,
                'slug' => $slug,
            ]);

            return back()->with('success', 'Berita berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }


    }

    /*
        public function old_tambahberita(Request $request)
        {
            // Validasi input
            $request->validate([
                //'id'   => 'required',
                'judul' => 'required',
                'isi' => 'required',
                'penulis' => 'required',
                //'password'    => 'required',
            ]);

            // Simpan ke database
            Beritas::create([
                //'id'     => $request->id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                //'isi' => bcrypt($request->isi),
                'penulis' => $request->penulis,
                //'kelas'    => $request->kelas,
            ]);

            return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
        }*/

    public function edit($id)
    {
        $berita = Beritas::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function destroy($id)
    {
        $berita = Beritas::findOrFail($id);
        $berita->delete();
        return redirect()->back()->with('success', 'Data berita berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
        $berita = Beritas::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',

        ]);

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->penulis = $request->penulis;




        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function galeri()
    {
        $beritas = Beritas::all();
        return view('galeri', compact('beritas'));
    }

    public function apipesankesan(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'penulis' => 'required|string|max:255',
            'konten' => 'required|string'
        ]);

        // simpan
        $data = Pesan_kesan::create([
            'penulis' => strtoupper($validated['penulis']),
            'konten' => $validated['konten'],
        ]);

        // response JSON
        return response()->json([
            'status' => true,
            'message' => 'Berhasil disimpan',
            'data' => $data
        ], 200);
    }


}
