<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'author' => 'J.R.R. Tolkien',
                'description' => 'Primeira parte da épica trilogia sobre a Terra Média e a jornada para destruir o Um Anel.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/81hCVEC0ExL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'read',
                'category_id' => Category::where('name', 'Fantasia')->first()->id
            ],
            [
                'title' => 'Duna',
                'author' => 'Frank Herbert',
                'description' => 'Épico de ficção científica sobre política, religião e ecologia no planeta desértico Arrakis.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/81zN7udGRUL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'reading',
                'category_id' => Category::where('name', 'Ficção Científica')->first()->id
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'Manual sobre como escrever código limpo e manutenível.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/41xShlnTZTL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'want_to_read',
                'category_id' => Category::where('name', 'Técnico/Programação')->first()->id
            ],
            [
                'title' => 'O Assassinato no Expresso do Oriente',
                'author' => 'Agatha Christie',
                'description' => 'Clássico mistério de Hercule Poirot em um trem luxuoso.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/81QcWCqvgdL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'read',
                'category_id' => Category::where('name', 'Mistério/Suspense')->first()->id
            ],
            [
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'description' => 'Biografia autorizada do cofundador da Apple.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/81VStYnDGrL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'reading',
                'category_id' => Category::where('name', 'Biografia')->first()->id
            ],
            [
                'title' => 'Orgulho e Preconceito',
                'author' => 'Jane Austen',
                'description' => 'Romance clássico sobre Elizabeth Bennet e Mr. Darcy.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/71Q1tPupKjL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'want_to_read',
                'category_id' => Category::where('name', 'Romance')->first()->id
            ],
            [
                'title' => 'Sapiens: Uma Breve História da Humanidade',
                'author' => 'Yuval Noah Harari',
                'description' => 'Análise da evolução da humanidade desde a Idade da Pedra até a era moderna.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/713jIoMO3UL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'read',
                'category_id' => Category::where('name', 'História')->first()->id
            ],
            [
                'title' => 'Hábitos Atômicos',
                'author' => 'James Clear',
                'description' => 'Guia prático para formar bons hábitos e quebrar os ruins.',
                'cover_image_url' => 'https://m.media-amazon.com/images/I/81YkqyaFVEL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'reading',
                'category_id' => Category::where('name', 'Autoajuda')->first()->id
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
