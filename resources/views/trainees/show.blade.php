<x-app-layout :breadcrumbs="$breadcrumbs">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $trainee->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col mt-2">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <div style='border-bottom: 2px solid #eaeaea'>
                        <ul class='flex cursor-pointer'>
                            @foreach ($modules as $module)
                                <li onclick="openTab(event, '{{$module->slug}}')" class="module-link py-2 px-6 rounded-t-lg {{ $loop->first ? 'bg-white' : 'bg-gray-200' }}">{{ $module->name }}</li>
                            @endforeach
                        </ul>

                        @foreach ($modules as $module)
                            <div id="{{$module->slug}}" class="modules {{ $loop->first ? 'block' : 'hidden' }}">
                                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 tracking-wider">
                                                    {{ __('Skills') }}
                                                </th>
                                                @foreach ($verifications as $verification)
                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 tracking-wider">
                                                        {{ $verification->name }}
                                                    </th>
                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 tracking-wider">
                                                        {{ __('Date') }}
                                                    </th>
                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 tracking-wider">
                                                        {{ __('Trainers Name') }}
                                                    </th>
                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 tracking-wider">
                                                        {{ __('Location') }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($module->skills as $skill)
                                                <tr>
                                                    <td colspan="{{($verifications->count() * 4) + 1}}" class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{$skill->name}}
                                                    </td>
                                                </tr>
                                                @foreach ($skill->tasks as $task)
                                                    <tr>
                                                        <td class="max-w-0 w-full px-6 py-4 text-sm text-gray-900">
                                                            {{$task->name}}
                                                        </td>
                                                        @foreach ($trainee->verifications()->wherePivot('task_id', $task->id)->orderByPivot('verification_id')->get() as $traineeVerification)
                                                            <td class="max-w-0 w-full px-6 py-4 text-sm text-gray-900">
                                                                {{$traineeVerification->pivot->verified}}
                                                            </td>
                                                            <td class="max-w-0 w-full px-6 py-4 text-sm text-gray-900">
                                                                {{$traineeVerification->pivot->verified_at}}
                                                            </td>
                                                            <td class="max-w-0 w-full px-6 py-4 text-sm text-gray-900">
                                                                {{optional($traineeVerification->pivot->trainer)->name}}
                                                            </td>
                                                            <td class="max-w-0 w-full px-6 py-4 text-sm text-gray-900">
                                                                {{optional($traineeVerification->pivot->location)->name}}
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function openTab(e, tab) {
        let modules = document.getElementsByClassName("modules");

        for (let i = 0; i < modules.length; i++) {
            modules[i].style.display = "none";
        }

        let tablinks = document.getElementsByClassName("module-link");
        for (let i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" bg-white", " bg-gray-200");
        }

        document.getElementById(tab).style.display = "block";
        e.currentTarget.className = e.currentTarget.className.replace(" bg-gray-200", " bg-white");
    }
</script>
