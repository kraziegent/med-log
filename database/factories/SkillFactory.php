<?php

namespace Database\Factories;

use App\Models\Skill;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

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
            'skill_type' => 'module skill',
        ];
    }

    /**
     * @param int $count
     * @return SkillFactory
     */
    public function withTasks($count = 5): SkillFactory
    {
        return $this->state([])
            ->afterCreating(function (Skill $skill)  use ($count) {
                $skill->tasks()->saveMany(Task::factory()->count($count)->create([
                    'skill_id' => $skill->id,
                ]));
            });
    }
}
