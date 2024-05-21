<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample authors data
        for ($i=1; $i <= 15; $i++) {
            $authors = [

                [
                    'first_name' => "Անուն$i",
                    'last_name' => "Ազգանուն$i",
                    'biography' => "Նախնական կրթությունը ստացել է ծխական դպրոցում, ապա՝ Երևանի պրոգիմնազիայում։ 1877 թվականին ընդունվել է Մոսկվայի Լազարյան ճեմարանի III դասարանը, 1884 թվականին՝ համալսարանի պատմալեզվագրական ֆակուլտետը, որն ավարտել է 1888 թվականին։$i",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]

            ];

            DB::table('authors')->insert($authors);
        }
    }
}
