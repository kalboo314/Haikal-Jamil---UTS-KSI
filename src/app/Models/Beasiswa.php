<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'text',
        'kuota',
        'deadline',
        'status',
    ];

    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class);
    }
}