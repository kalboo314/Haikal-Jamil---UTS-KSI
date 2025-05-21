<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'applicant_id', 'type', 'file_path',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->id = $model->id ?? (string) Str::uuid();
        });
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}