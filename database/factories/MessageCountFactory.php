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
            'sent_emails' => 10,
            'available_emails' => 20,
            'sent_sms' => 15,
            'available_sms' => 30
        ];
    }
}
