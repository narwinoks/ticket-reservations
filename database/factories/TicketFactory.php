<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(10),
            'slug'=>$this->faker->slug(10),
            'price'=>20000,
            'highlight'=>$this->faker->text(50),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->text(200),
            'event_date'=>$this->faker->date('Y-m-d'),
            'open_at'=>now()
        ];
    }
}
