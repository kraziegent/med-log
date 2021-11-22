<x-app-layout :breadcrumbs="$breadcrumbs">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modules') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="shadow sm:hidden">
            <ul class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
                @foreach ($modules as $module)
                    <li>
                        <a href="{{ route('modules.show', ['module' => $module]) }}" class="block px-4 py-4 bg-white hover:bg-gray-50">
                            <span class="flex items-center space-x-4">
                                <span class="flex-1 flex space-x-2 truncate">
                                    <span class="flex flex-col text-gray-500 text-sm truncate">
                                        <span class="truncate">{{ $module->name }}</span>
                                        <span class="truncate">{{ $module->description }}</span>
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
                <a href="{{ $modules->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                Previous
                </a>
                <a href="{{ $modules->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
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
                                        {{ __('Description') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($modules as $module)
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $module->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $module->description }}
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('modules.show', ['module' => $module]) }}" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline transition ease-in-out duration-150">
                                                {{ __('View') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        @if ($modules->hasPages())
                            <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                                <div class="hidden sm:block">
                                    <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium">{{ $module->firstItem() }}</span>
                                    to
                                    <span class="font-medium">{{ $module->lastItem() }}</span>
                                    of
                                    <span class="font-medium">{{ $module->total() }}</span>
                                    results
                                    </p>
                                </div>
                                <div class="flex-1 flex justify-between sm:justify-end">
                                    {{-- @if (! $trainees->onFirstPage()) --}}
                                        <a href="{{ $module->previousPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Previous
                                        </a>
                                    {{-- @endif
                                    @if (! $trainees->hasMorePages()) --}}
                                        <a href="{{ $module->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
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
