<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class VerifyTask extends Component
{
    public bool $isOpen = false;

    public Task $task;

    public Collection $verifications;

    public array $verifiers;

    /**
     * Open the modal
     */
    public function openModal()
    {
        $this->verifications = $this->task->userVerifications(auth()->user());

        foreach($this->verifications as $verification) {
            $this->verifiers[$verification->slug] = $verification->pivot->verified;
        }

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
     * Update the verifications for the user
     */
    public function store()
    {
        $this->closeModal();
        $user = auth()->user();

        // TODO:: This is a hack and I don't like it, but for some reason the pivot relation is lost or livewire reloads.
        $this->verifications = $this->task->userVerifications($user);

        foreach($this->verifications as $verification) {
            $verified = $this->verifiers[$verification->slug];

            if ($verification->pivot->verified != $verified) {
                $verification->tasks()->updateExistingPivot($this->task->id, [
                    'verified' => $verified,
                    'verified_at' => now(),
                ]);
                Cache::forget("user-{$user->id}-task-{$this->task->id}-verifications");
            }
        }
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <x-jet-secondary-button wire:click="openModal" class="mt-1">
                    Verify Task
                </x-jet-secondary-button>
                @if($isOpen)
                    @include('modules.modal')
                @endif
            </div>
        blade;
    }
}
