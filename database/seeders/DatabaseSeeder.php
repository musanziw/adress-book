<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Group;
use App\Models\MessageCount;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(2)
            ->has(MessageCount::factory(1))
            ->create();
    }
}
