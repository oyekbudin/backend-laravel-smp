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
            ->take(10)
            ->get();

        return view('show', compact('berita', 'lainnya'));
    }

    public function tambahberita(Request $request)
    {
        $data = [];

        // =====================
        // FOTO UTAMA (gambar)
        // =====================
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $nama = time() . '_1.' . $file->getClientOriginalExtension();

            $file->move(public_path('upload'), $nama);

            $data['gambar'] = $nama;
        }

        // =====================
        // ALBUM (gambar2 - gambar10)
        // =====================
        for ($i = 2; $i <= 10; $i++) {
            if ($request->hasFile('gambar' . $i)) {
                $file = $request->file('gambar' . $i);

                $nama = time() . '_' . $i . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('upload'), $nama);

                $data['gambar' . $i] = $nama;
            }
        }

        // =====================
        // FIELD LAIN
        // =====================
        $data['judul'] = $request->judul;
        $data['isi'] = $request->isi;

        // =====================
        // INSERT
        // =====================
        \App\Models\Beritas::create($data);

        return redirect()->back();
    }
    public function oldtambahberita(Request $request)
    {
        try {

            $request->validate([
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            ]);

            $penulis = Auth::user()->nama_lengkap ?? 'Admin';

            $uploadPath = base_path('../public_html/uploads/berita');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            // function upload
            function uploadGambar($file, $judul, $uploadPath)
            {
                $baseName = \Str::slug($judul);
                $ext = $file->getClientOriginalExtension();
                $filename = $baseName . '.' . $ext;

                $counter = 1;
                while (file_exists($uploadPath . '/' . $filename)) {
                    $filename = $baseName . '-' . $counter . '.' . $ext;
                    $counter++;
                }

                $file->move($uploadPath, $filename);

                return 'uploads/berita/' . $filename;
            }

            // =====================
            // UPLOAD
            // =====================
            $data = [];

            // gambar utama
            if ($request->hasFile('gambar')) {
                $data['gambar'] = uploadGambar(
                    $request->file('gambar'),
                    $request->judul,
                    $uploadPath
                );

                $data['thumbnail'] = $data['gambar'];
            }

            // album
            for ($i = 2; $i <= 10; $i++) {
                if ($request->hasFile('gambar' . $i)) {
                    $data['gambar' . $i] = uploadGambar(
                        $request->file('gambar' . $i),
                        $request->judul . '-' . $i,
                        $uploadPath
                    );
                }
            }

            // slug unik
            $baseSlug = Str::slug($request->judul);
            $slug = $baseSlug;
            $counter = 1;

            while (Beritas::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // simpan
            \App\Models\Beritas::create(array_merge([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'penulis' => $penulis,
                'slug' => $slug,
            ], $data));

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
