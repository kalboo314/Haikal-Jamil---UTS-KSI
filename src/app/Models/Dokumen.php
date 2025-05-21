<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'mahasiswa_id',
        'pendaftar_id',
        'file_path',
    ];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}