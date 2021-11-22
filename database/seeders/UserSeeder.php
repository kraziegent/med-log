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
        $this->command->info('Creating administrator user for this instance...');

        $administrator = \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => '$2y$10$6amLhxVOnuV9KPIzD5DYJeOOTbt9lQfU8Qb12Gen978myRA27kuXm',
            'role' => 'staff',
            'status' => 'staff',
        ]);

        $this->command->info('Administrator created successfully.');

        $this->command->info('Attaching roles and permissions to administrator...');

        $role = \App\Models\Role::whereName('administrator')->first();

        $administrator->attachRole($role);

        $this->command->info('Roles attached to administrator successfully.');

        $this->command->info('Creating trainee users');

        \App\Models\User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => '$2y$10$6amLhxVOnuV9KPIzD5DYJeOOTbt9lQfU8Qb12Gen978myRA27kuXm',
            'role' => 'trainee',
        ]);

        \App\Models\User::factory()->count(10)->create();

        $users = \App\Models\User::whereRole('trainee')->get();
        $role = \App\Models\Role::whereName('trainee')->first();

        $users->each(function($user) use($role) {
            $user->attachRole($role);
        });

    }
}
