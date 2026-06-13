<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Beritas extends Model
{
    use  HasFactory;
    protected $table = 'beritas'; // Nama tabel sesuai di database
    protected $primaryKey = 'id_berita';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       
        'judul',
        'isi',
        'penulis',
        'slug',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'gambar5',
        'gambar6',
        'gambar7',
        'gambar8',
        'gambar9',
        'gambar10',

        
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public $timestamps = false;

    /*protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul, '-');
        });

        static::updating(function ($berita) {
            $berita->slug = Str::slug($berita->judul, '-');
        });
    }*/
    

}
