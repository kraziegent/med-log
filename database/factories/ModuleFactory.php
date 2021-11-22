<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
        ];
    }

    /**
     * @param int $count
     * @return ModuleFactory
     */
    public function withSkills($count = 2): ModuleFactory
    {
        return $this->state([])
            ->afterCreating(function (Module $module)  use ($count) {
                $module->skills()->saveMany(Skill::factory()->withTasks(5)->count($count)->create([
                    'module_id' => $module->id,
                ]));
            });
    }
}
