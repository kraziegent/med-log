<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LaratrustSeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            VerificationSeeder::class,
        ]);

        $users = \App\Models\User::where('role', '<>', 'staff')->get();
        $verifications = \App\Models\Verification::all();
        $modules = \App\Models\Module::with(['skills', 'skills.tasks'])->get();

        foreach($users as $user) {
            foreach($modules as $module) {
                $user->modules()->attach($module->id);

                foreach($module->skills as $skill) {
                    foreach($skill->tasks as $task) {
                        foreach($verifications as $verification) {
                            $user->verifications()->attach($verification->id, [
                                'task_id' => $task->id,
                            ]);
                        }
                    }
                }

            }
        }
    }
}
