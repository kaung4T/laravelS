<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'user_id' => User::all()->random()->id,
            'user_id_2' => User::all()->random()->id,
            'description' => fake()->text(),
            'name2' => fake()->name(),
        ];
    }

    // public function configure ()
    // {
    //     return $this->afterCreating(function (Product $product) {
    //         $user = User::inRandomOrder()->take(2)->pluck('id');
    //         $product->find(1)->user_many()->syncWithoutDetaching($user);
    //     });
    // }
}
