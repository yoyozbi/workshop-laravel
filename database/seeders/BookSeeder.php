<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();

        Book::create([
            'title' => 'The Great Gatsby',
            'pages' => 1200,
            'isbn' => '9780743273565',
            'quantity' => 3,
            'description' => 'A novel written by American author F. Scott Fitzgerald.'
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'pages' => 281,
            'isbn' => '9780061120084',
            'quantity' => 0,
            'description' => 'A novel by Harper Lee published in 1960.'
        ]);

        Book::create([
            'title' => '1984',
            'pages' => 328,
            'isbn' => '9780451524935',
            'quantity' => 5,
            'description' => 'A dystopian social science fiction novel and cautionary tale, written by the English writer George Orwell.'
        ]);
    }
}
