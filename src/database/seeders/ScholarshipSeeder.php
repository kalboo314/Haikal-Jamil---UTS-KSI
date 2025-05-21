<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;
use Illuminate\Support\Str;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $scholarships = [
            [
                'id' => Str::uuid(),
                'name' => 'Beasiswa Unggulan Mahasiswa',
                'description' => 'Beasiswa untuk mahasiswa berprestasi.',
                'quota' => 100,
                'deadline' => now()->addMonths(2),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Beasiswa Kurang Mampu',
                'description' => 'Beasiswa untuk mahasiswa dari keluarga kurang mampu.',
                'quota' => 50,
                'deadline' => now()->addMonth(),
            ]
        ];

        foreach ($scholarships as $scholarship) {
            Scholarship::create($scholarship);
        }
    }
}
