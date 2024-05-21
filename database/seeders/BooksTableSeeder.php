<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            $books = [
                [
                    'title' => "Գիրք$i",
                    'description' => "նկարագրություն$i",
                    'publication_year' => 1901+$i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ];
            DB::table('books')->insert($books);
        }
    }
}
