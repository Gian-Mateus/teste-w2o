<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                // 'id' => fake()->id(),
                'category_name' => 'Eletrônicos',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Vestuário',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Brinquedos',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Esportes',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Móveis',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Ferramentas',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Alimentos',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Saúde e Beleza',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Livros',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ],
            [
                // 'id' => fake()->id(),
                'category_name' => 'Automotivo',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date()
            ]
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
