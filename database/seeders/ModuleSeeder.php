<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['MA -FD- PHASE 1', 'MA -Lab- PHASE 1', 'MA -Lab- PHASE 2'] as $module) {
            \App\Models\Module::factory()->withSkills(3)->create([
                'name' => $module,
            ]);
        }
    }
}
