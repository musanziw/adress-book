<?php

namespace Database\Factories;

use App\Models\MessageCount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MessageCount>
 */
class MessageCountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sent_emails' => 0,
            'available_emails' => $this->faker->numberBetween(0, 100),
            'sent_sms' => 0,
            'available_sms' => $this->faker->numberBetween(0, 200),
        ];
    }
}
