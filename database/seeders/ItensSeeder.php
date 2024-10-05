<?php

namespace Database\Seeders;

use App\Models\Itens;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itens = [
            [
                // 'id' => fake()->id(),
                'name' => 'Smartphone Samsung Galaxy S21',
                'category_id' => random_int(1, 10),
                'description' => 'Smartphone com tela de 6.2 polegadas, 128GB de armazenamento e câmera tripla de 64MP.',
                'price' => 3999.99,
                'image' => 'https://via.placeholder.com/640x480.png?text=Samsung+Galaxy+S21',
                'expiration_date' => '2025-12-01',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Camisa Polo Lacoste',
                'category_id' => random_int(1, 10),
                'description' => 'Camisa polo de alta qualidade, com logo bordado, disponível em várias cores.',
                'price' => 349.90,
                'image' => 'https://via.placeholder.com/640x480.png?text=Camisa+Polo+Lacoste',
                'expiration_date' => '2024-12-01',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'LEGO Star Wars Millennium Falcon',
                'category_id' => random_int(1, 10),
                'description' => 'Modelo LEGO detalhado da Millennium Falcon, ideal para fãs de Star Wars.',
                'price' => 1299.99,
                'image' => 'https://via.placeholder.com/640x480.png?text=LEGO+Millennium+Falcon',
                'expiration_date' => '2025-03-22',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Bola de Futebol Nike',
                'category_id' => random_int(1, 10),
                'description' => 'Bola de futebol oficial da Nike, utilizada nas principais competições.',
                'price' => 149.99,
                'image' => 'https://via.placeholder.com/640x480.png?text=Bola+de+Futebol+Nike',
                'expiration_date' => '2024-11-05',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Sofá Retrátil 4 Lugares',
                'category_id' => random_int(1, 10),
                'description' => 'Sofá retrátil de 4 lugares, super confortável, com design moderno.',
                'price' => 2599.99,
                'image' => 'https://via.placeholder.com/640x480.png?text=Sofá+Retrátil',
                'expiration_date' => '2025-06-30',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Furadeira Bosch GSB 13 RE',
                'category_id' => random_int(1, 10),
                'description' => 'Furadeira Bosch com 600W de potência, ideal para trabalhos em casa e na construção.',
                'price' => 349.90,
                'image' => 'https://via.placeholder.com/640x480.png?text=Furadeira+Bosch',
                'expiration_date' => '2024-10-10',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Kit de Alimentos Orgânicos',
                'category_id' => random_int(1, 10),
                'description' => 'Kit completo com frutas, verduras e legumes orgânicos, direto da fazenda.',
                'price' => 99.90,
                'image' => 'https://via.placeholder.com/640x480.png?text=Kit+Orgânicos',
                'expiration_date' => '2025-01-28',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Shampoo Pantene 400ml',
                'category_id' => random_int(1, 10),
                'description' => 'Shampoo Pantene Pro-V, ideal para todos os tipos de cabelo, hidratação profunda.',
                'price' => 24.90,
                'image' => 'https://via.placeholder.com/640x480.png?text=Shampoo+Pantene',
                'expiration_date' => '2025-08-20',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Livro - O Poder do Hábito',
                'category_id' => random_int(1, 10),
                'description' => 'Livro best-seller de Charles Duhigg, que explora como os hábitos funcionam e como mudá-los.',
                'price' => 39.90,
                'image' => 'https://via.placeholder.com/640x480.png?text=O+Poder+do+Hábito',
                'expiration_date' => '2024-07-17',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ],
            [
                // 'id' => fake()->id(),
                'name' => 'Pneu Pirelli Scorpion 235/60R18',
                'category_id' => random_int(1, 10),
                'description' => 'Pneu de alta performance para SUVs e veículos utilitários, com ótima durabilidade.',
                'price' => 789.99,
                'image' => 'https://via.placeholder.com/640x480.png?text=Pneu+Pirelli+Scorpion',
                'expiration_date' => '2024-04-12',
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
                'sku' => fake()->uuid()
            ]
        ];

        foreach ($itens as $item) {
            Itens::create($item);
        }
    }
}
