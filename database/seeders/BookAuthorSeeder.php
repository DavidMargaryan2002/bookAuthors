<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<15; $i++) {
                $bookAuthors = [

                    [
                        'book_id' => rand(1,15),
                        'author_id' => rand(1,15),
                    ]

                ];
            DB::table('book_authors')->insert($bookAuthors);
        }
    }
}
