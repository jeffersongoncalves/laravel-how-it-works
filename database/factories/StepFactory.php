<?php

namespace JeffersonGoncalves\HowItWorks\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JeffersonGoncalves\HowItWorks\Models\Step;

/** @extends Factory<Step> */
class StepFactory extends Factory
{
    protected $model = Step::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'icon' => 'heroicon-o-'.fake()->randomElement(['user-plus', 'shopping-cart', 'truck', 'check-circle']),
            'title' => ['en' => fake()->unique()->sentence(3)],
            'description' => ['en' => fake()->paragraph()],
            'order' => 0,
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
