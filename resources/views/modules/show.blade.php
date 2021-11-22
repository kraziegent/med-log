<x-app-layout :breadcrumbs="$breadcrumbs">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ "{$module->name} Skills" }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{selected:null}">
            <ul class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:rounded-lg">
                @foreach ($module->skills as $skill)
                    <li>
                        <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50" x-on:click="selected !== {{$loop->iteration}} ? selected = {{$loop->iteration}} : selected = null">
                            <span class="flex items-center space-x-4">
                                <span class="flex-1 flex space-x-2 truncate">
                                    <span class="flex flex-col text-gray-500 text-sm truncate">
                                        <span class="truncate">{{ $skill->name }}</span>
                                        <span class="truncate">{{ $skill->description }}</span>
                                    </span>
                                </span>
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                        <div class="px-4 py-4 overflow-hidden transition-all duration-700" :class="selected == {{$loop->iteration}} ? 'block' : 'hidden'" x-transition>
                            @foreach ($skill->tasks as $task)
                                <span class="flex items-center space-x-4">
                                    <span class="flex-1 flex space-x-2 text-gray-500 text-sm">{{$task->name}}</span>
                                    @livewire('verify-task', ['task' => $task])
                                </span>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-app-layout>
