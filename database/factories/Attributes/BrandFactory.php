<?php

namespace Database\Factories\Attributes;

use App\Enums\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attributes\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $key = array_rand(Country::cases());
        $name = fake()->company();
        $slug = Str::of( $name )->slug( '-' );
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->sentences(rand(2,5), true),
            'country' => Country::cases()[$key]->value
        ];
    }
}
