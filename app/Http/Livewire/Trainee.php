<?php

namespace App\Http\Livewire;

use App\Models\Module;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Trainee extends Component
{
    public bool $isOpen = false;

    public array $options = [
        'ongoing' => 'Ongoing',
        'completed' => 'Completed',
    ];

    public array $state = [
        'name',
        'email',
        'status',
    ];

    public Collection $modules;

    /**
     * Open the modal
     */
    public function openModal()
    {
        $this->modules = Module::with(['skills', 'skills.tasks'])->whereStatus('active')->get();

        $this->isOpen = true;
    }

    /**
     * Close the modal
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * Store a new trainee
     */
    public function store()
    {
        // Save the user
        // Attach all/selected modules to the user
        // For each module attach all verifications on each task linked to skills in the module

        $password = random_int(100000, 999999);
        $trainee = new User(array_merge($this->state, ['password' => bcrypt($password)]));

        $trainee->save();

        $verifications = Verification::all();

        foreach($this->modules as $module) {
            $trainee->modules()->attach($module->id);

            foreach($module->skills as $skill) {
                foreach($skill->tasks as $task) {
                    foreach($verifications as $verification) {
                        $trainee->verifications()->attach($verification->id, [
                            'task_id' => $task->id,
                        ]);
                    }
                }
            }
        }

        $this->closeModal();
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <x-jet-secondary-button wire:click="openModal" class="mt-1">
                    Add Trainee
                </x-jet-secondary-button>
                @if($isOpen)
                    @include('trainees.store')
                @endif
            </div>
        blade;
    }
}
