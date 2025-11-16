<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $filename = $this->faker->uuid().'.jpg';

        // Cria um arquivo de imagem fake no disco
        Storage::disk('public')->put("categories/{$filename}", 'fake image');

        return [
            'name'  => $this->faker->words(2, true),  // corrigido também
            'image' => "categories/{$filename}",
        ];
    }
}
