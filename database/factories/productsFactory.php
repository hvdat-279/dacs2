<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $product = \App\Models\products::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word, // Tạo tiêu đề sản phẩm ngẫu nhiên
            'price' => $this->faker->randomFloat(2, 1000, 500000), // Tạo giá ngẫu nhiên từ 1000 đến 500000
            'description' => $this->faker->sentence(10), // Tạo mô tả sản phẩm với 10 từ
            'stock' => $this->faker->numberBetween(1, 100), // Tạo số lượng ngẫu nhiên từ 1 đến 100

        ];
    }
}
