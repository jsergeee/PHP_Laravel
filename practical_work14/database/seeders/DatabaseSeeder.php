<?php

namespace Database\Seeders;

use App\Models\User;
use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder // <-- Убедитесь, что имя класса правильное
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
             RolesTableSeeder::class, // <-- Вызываете сидер ролей
             // ... другие сидеры ...
        ]);

        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'role_id' => $adminRole->id,
            ]);
        } else {
             \Log::error("Role 'admin' not found after seeding.");
        }

        $userRole = Role::where('name', 'user')->first();
        if ($userRole) {
            User::factory(10)->create([
                'role_id' => $userRole->id,
            ]);
        } else {
             \Log::error("Role 'user' not found after seeding.");
        }
    }
}