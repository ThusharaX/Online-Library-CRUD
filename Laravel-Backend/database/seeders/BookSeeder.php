<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('books')->insert([
            'title' => 'The Great Gatsby',
            'description' => 'The Great Gatsby is a 1925 novel written by F. Scott Fitzgerald, published in 1925 byPublishers.',
            'genre' => 'Fiction',
            'price' => '1000',
        ]);

        DB::table('books')->insert([
            'title' => 'The Lord of the Rings',
            'description' => 'The Lord of the Rings is a 1954 novel written by English author J. R. R. Tolkien. It is considered by many to be the best-selling book of all time.',
            'genre' => 'Fiction',
            'price' => '2000',
        ]);

        DB::table('books')->insert([
            'title' => 'The Hobbit',
            'description' => 'The Hobbit, or There and Back Again is a 1937 fantasy novel by English author J. R. R. Tolkien. It is the first of three volumes in The Hobbit, the other two being The Return of the King and The Two Towers.',
            'genre' => 'Fiction',
            'price' => '3000',
        ]);

        DB::table('books')->insert([
            'title' => 'The Catcher in the Rye',
            'description' => 'The Catcher in the Rye is a 1951 novel by J. D. Salinger. It is considered by many to be one of the best-selling novels of all time.',
            'genre' => 'Fiction',
            'price' => '4000',
        ]);

        DB::table('books')->insert([
            'title' => 'Time Machine',
            'description' => 'Time Machine is a science fiction novel by American author Philip K. Dick. It was published in the United States in March 1985.',
            'genre' => 'Fiction',
            'price' => '5000',
        ]);

        DB::table('books')->insert([
            'title' => 'Titanic',
            'description' => 'Titanic is a 1997 American epic romance novel written by James Cameron, based on the 1997 film of the same name.',
            'genre' => 'Fiction',
            'price' => '6000',
        ]);

        DB::table('books')->insert([
            'title' => 'Notebook',
            'description' => 'Notebook is a novel by American author Philip K. Dick. It was published in the United States in March 1985.',
            'genre' => 'Fiction',
            'price' => '7000',
        ]);

        DB::table('books')->insert([
            'title' => 'Love',
            'description' => 'Love is a novel by American author Philip K. Dick. It was published in the United States in March 1985.',
            'genre' => 'Fiction',
            'price' => '8000',
        ]);
    }
}
