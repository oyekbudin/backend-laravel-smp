<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jadwal extends Model
{
    use  HasFactory;
    protected $table = 'jadwal'; // Nama tabel sesuai di database
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       
    
        'id_guru',
        'id_pelajaran',
        'id_kelas',

        
        
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
