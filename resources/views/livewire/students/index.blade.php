<div class="container mx-auto flex flex-col">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students List') }}
        </h2>
        <small class="text-blue-900 drop-shadow">Pagination Example</small>

        <a href="{{route('students.create')}}" type="button" class="sm:-mt-7 sm:mr-4 p-1 px-5 bg-emerald-500 text-white rounded shadow-md float-right" wire:navigate>
            Create
        </a>
    </x-slot>

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:pt-10 pb-20">
                <div class="my-6 sm:ml-0 ml-2 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-y-4">
                    <div class="flex items-center justify-center gap-2">
                        <span class="sm:hidden">Showing</span>
                        <select wire:model.live="perPage"
                            class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-100 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="sm:w-1/4 w-1/2">
                        <input type="text" autocomplete="off" wire:model.live.debounce.300ms="search" placeholder="Search..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-100 sm:max-w-sm sm:text-sm sm:leading-6 @error('search') {{'ring-red-300 focus:ring-red-300 text-red-500'}} @enderror">
                    </div>
                </div>

                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium">
                        <x-datatable-headers :headers="$headers" :sortBy="$sortBy" :direction="$sortDirection" />
                    </thead>
                    <tbody wire:loading.class="animate-pulse">
                        @forelse ($students as $student)
                        <tr wire:key="{{ $student->id }}" class="border-b transition duration-300 ease-in-out hover:bg-blue-50">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $student->id }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $student->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $student->email }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $student->class->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $student->section->name }}</td>
                            <td class="px-6 py-4">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-500 bg-transparent hover:text-slate-700 focus:outline-none transition ease-in-out duration-150">
                                            <x-bi-three-dots-vertical class="fill-current h-4 w-4"/>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('students.edit', $student->id)" wire:navigate>
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        <button type="button" wire:confirm="Are you sure?" wire:click="deleteStudent({{$student->id}})" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" wire:ignore>
                                            Remove
                                        </button>
                                    </x-slot>
                                </x-dropdown>
                            </td>
                        </tr>
                        @empty
                        <tr class="border-b transition duration-300 ease-in-out hover:bg-blue-100">
                            <td colspan="6" class="whitespace-nowrap px-6 py-4 font-medium text-center text-slate-500">No Data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mx-4 sm:mx-0 my-4 sm:mt-0">
        {{ $students->links(data: ['scrollTo' => false]) }}
    </div>
</div>
