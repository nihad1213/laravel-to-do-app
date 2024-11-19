<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 users, each with 5 tasks
        User::factory(5)
            ->has(Task::factory(5))
            ->create();

        // Create 10 additional standalone tasks
        Task::factory(10)->create();
    }
}
