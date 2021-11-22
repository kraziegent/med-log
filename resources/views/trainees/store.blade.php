<x-jet-dialog-modal wire:model="isOpen">
    <x-slot name="title">
        New Trainee
    </x-slot>

    <x-slot name="content">
        <div class="px-4 py-4 overflow-hidden transition-all duration-700">
            <form id="trainee" wire:submit.prevent="store">
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <!-- Status -->
                <div class="mt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="status" value="{{ __('Status') }}" />
                    <x-select id="status" class="mt-1 block w-full" wire:model="state.status" :options="$options" />
                    <x-jet-input-error for="status" class="mt-2" />
                </div>

                <!-- Modules -->
                {{-- <div class="mt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="modules" value="{{ __('Modules') }}" />
                    <x-multi-select2 id="modules" class="mt-1 block w-full" wire:model="state.modules" :options="$modules->pluck('name', 'slug')->toArray()" />
                    <x-jet-input-error for="modules" class="mt-2" />
                </div> --}}
            </form>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>

        <x-jet-button form="trainee" class="ml-2" wire:loading.attr="disabled">
            Save Trainee
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
