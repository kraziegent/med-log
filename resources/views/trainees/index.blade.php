<x-app-layout :breadcrumbs="$breadcrumbs">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trainees') }}
        </h2>
    </x-slot>

    <x-slot name="create">
        @livewire('trainee')
    </x-slot>

    <div class="py-6">
        <div class="shadow sm:hidden">
            <ul class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
                @foreach ($trainees as $trainee)
                    <li>
                        <a href="{{ route('trainees.show', ['trainee' => $trainee]) }}" class="block px-4 py-4 bg-white hover:bg-gray-50">
                            <span class="flex items-center space-x-4">
                                <span class="flex-1 flex space-x-2 truncate">
                                    <!-- Heroicon name: solid/cash -->
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $trainee->profile_photo_url }}" alt="{{ $trainee->name }}"/>
                                    </div>
                                    <span class="flex flex-col text-gray-500 text-sm truncate">
                                        <span class="truncate">{{ $trainee->name }}</span>
                                        <span class="text-gray-900 font-medium">{{ $trainee->email }}</span>
                                        <span class="text-gray-900 font-medium">07065914552</span>
                                    </span>
                                </span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
            <div class="flex-1 flex justify-between">
                <a href="{{ $trainees->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                Previous
                </a>
                <a href="{{ $trainees->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                Next
                </a>
            </div>
            </nav>
        </div>

        <div class="hidden sm:block">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col mt-2">
                    <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Phone') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Status') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($trainees as $trainee)
                                    <tr>
                                        <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ $trainee->profile_photo_url }}" alt="{{ $trainee->name }}"/>
                                                </div>
                                                <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $trainee->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $trainee->email }}
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                            <span class="text-gray-900 font-medium">070651437393 </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize">
                                            success
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('trainees.show', ['trainee' => $trainee]) }}" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline transition ease-in-out duration-150">
                                                {{ __('View') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        @if ($trainees->hasPages())
                            <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                                <div class="hidden sm:block">
                                    <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium">{{ $trainees->firstItem() }}</span>
                                    to
                                    <span class="font-medium">{{ $trainees->lastItem() }}</span>
                                    of
                                    <span class="font-medium">{{ $trainees->total() }}</span>
                                    results
                                    </p>
                                </div>
                                <div class="flex-1 flex justify-between sm:justify-end">
                                    {{-- @if (! $trainees->onFirstPage()) --}}
                                        <a href="{{ $trainees->previousPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Previous
                                        </a>
                                    {{-- @endif
                                    @if (! $trainees->hasMorePages()) --}}
                                        <a href="{{ $trainees->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Next
                                        </a>
                                    {{-- @endif --}}
                                </div>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
