<x-jet-dialog-modal wire:model="isOpen">
    <x-slot name="title">
        Verifications for {{$task->name}}
    </x-slot>

    <x-slot name="content">
        <div class="px-4 py-4 overflow-hidden transition-all duration-700">
            <form id="{{$task->slug}}" wire:submit.prevent="store">
                @foreach ($verifications as $verification)
                    <span class="flex items-center space-x-4">
                        <span class="flex-1 flex space-x-2 text-gray-500 text-sm">{{$verification->name}}</span>
                        <select class="flex-shrink-0 h-9 mt-1 rounded" wire:model="verifiers.{{$verification->slug}}">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </span>
                @endforeach
            </form>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>

        <x-jet-button form="{{$task->slug}}" class="ml-2" wire:loading.attr="disabled">
            Verify
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
