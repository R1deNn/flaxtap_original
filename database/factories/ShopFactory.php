<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ShopFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_category' => fake()->numberBetween(1, 5),
            'id_vobler' => fake()->numberBetween(0,2),
            'title' => fake()->name(),
            'description' => fake()->realText(100),
            'default_price' => fake()->numberBetween(500, 5000),
            'price_student' => fake()->numberBetween(480, 4500),
            'price_opt_student' => fake()->numberBetween(300, 3000),
            'amount' => fake()->numberBetween(0, 100),
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}
