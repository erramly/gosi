<?php

namespace Database\Seeders;

use App\Models\CheckUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class CheckUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            CheckUser::create([
                'national_id' => rand(1000000000, 9999999999), // رقم هوية عشوائي
                'serial_number' => strtoupper(Str::random(8)), // رقم تسلسلي عشوائي
                'pdf_path' => 'pdfs/sample.pdf', // ملف PDF ثابت وهمي
            ]);
        }
    }
}
