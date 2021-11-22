<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['Task observed by trainee(TS)', 'Task performed with Verifier(D)', 'Completed Independently(x5)'] as $verification) {
            \App\Models\Verification::factory()->create([
                'name' => $verification,
            ]);
        }
    }
}
