<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kost extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id_kost', 'nama_kost', 'alamat', 'fasilitas','harga_per_bulan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
