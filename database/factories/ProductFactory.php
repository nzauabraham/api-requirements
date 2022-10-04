<?php

namespace Database\Factories;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $categories = ['insurance', 'vehicle'];
        $category = $categories[array_rand($categories)];
        $discount = $category === 'insurance' ? 30 : NULL;
        $original_price = $this->faker->numberBetween(10000, 90000);
        if($discount){
            $discount_percent_val = $discount.'%';
            $final_price = $original_price - (int) (($discount/100) * $original_price);
        }else{
            $discount_percent_val = null;
            $final_price = $original_price;
        }
        return [
            'sku'=> sprintf('%06d', $this->faker->randomDigit()),
            'name'=> $this->faker->text(20),
            'category'=>$category,
            'price'=> json_encode([
                'original' => $original_price,
                'final' => $final_price,
                'discount_percentage' => $discount_percent_val,
                'currency' => 'EUR'
            ], JSON_THROW_ON_ERROR)
        ];
    }
}
