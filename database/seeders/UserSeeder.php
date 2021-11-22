<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => '$2y$10$6amLhxVOnuV9KPIzD5DYJeOOTbt9lQfU8Qb12Gen978myRA27kuXm',
            'role' => 'staff',
            'status' => 'staff',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => '$2y$10$6amLhxVOnuV9KPIzD5DYJeOOTbt9lQfU8Qb12Gen978myRA27kuXm',
            'role' => 'trainee',
        ]);

        \App\Models\User::factory()->count(10)->create();
    }
}
