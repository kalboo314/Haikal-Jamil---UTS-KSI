<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Scholarship extends Model
{
    use HasFactory;


    protected $fillable = [
        'id', 'name', 'description', 'quota', 'deadline',
    ];



    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}