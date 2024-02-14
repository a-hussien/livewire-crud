<div class="container mx-auto flex flex-col">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students List') }}
        </h2>

        <a href="{{route('students.create')}}" type="button" class="sm:-mt-7 sm:mr-4 p-1 px-5 bg-emerald-500 text-white rounded shadow-md float-right" wire:navigate >
            Create
        </a>
    </x-slot>

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 my-4">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium">
                <tr>
                <th scope="col" class="px-6 py-4">#</th>
                <th scope="col" class="px-6 py-4">Name</th>
                <th scope="col" class="px-6 py-4">Email</th>
                <th scope="col" class="px-6 py-4">Class</th>
                <th scope="col" class="px-6 py-4">Section</th>
                <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr class="border-b transition duration-300 ease-in-out hover:bg-blue-50">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $student->id }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $student->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $student->email }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $student->class->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $student->section->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-transparent hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                        <div class="ms-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-current h-4 w-4" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                              </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('students.edit', $student->id)" wire:navigate >
                                        {{ __('Edit') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                <tr class="border-b transition duration-300 ease-in-out hover:bg-blue-100">
                <td colspan="6" class="whitespace-nowrap px-6 py-4 font-medium">No Data.</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
        </div>
    </div>

    <div class="mx-4 md:mx-0 mt-0 mb-4">
        {{ $students->links(data: ['scrollTo' => false]) }}
    </div>
</div>
