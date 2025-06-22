<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Romance',
                'description' => 'Livros de romance, histórias de amor e relacionamentos.'
            ],
            [
                'name' => 'Ficção Científica',
                'description' => 'Livros que exploram conceitos científicos e tecnológicos futuristas.'
            ],
            [
                'name' => 'Fantasia',
                'description' => 'Livros com elementos mágicos, criaturas fantásticas e mundos imaginários.'
            ],
            [
                'name' => 'Mistério/Suspense',
                'description' => 'Livros de mistério, suspense, thrillers e investigação.'
            ],
            [
                'name' => 'Biografia',
                'description' => 'Histórias de vida de pessoas reais e autobiografias.'
            ],
            [
                'name' => 'Autoajuda',
                'description' => 'Livros de desenvolvimento pessoal e profissional.'
            ],
            [
                'name' => 'Técnico/Programação',
                'description' => 'Livros sobre tecnologia, programação e desenvolvimento de software.'
            ],
            [
                'name' => 'História',
                'description' => 'Livros sobre eventos históricos e análises do passado.'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
