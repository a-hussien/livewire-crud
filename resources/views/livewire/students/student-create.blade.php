<div class="container mx-auto flex flex-col">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new student') }}
        </h2>
    </x-slot>

    <div class="mt-16 border-t-2 border-blue-400 bg-white rounded-md shadow hover:shadow-md">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <form wire:submit="createStudent">
                <div class="container mx-auto">
                    <div class="border-b border-gray-900/10 py-2">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">
                            Student Information
                        </h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            Fill in the information below.
                        </p>

                        <div class="my-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Name
                                </label>
                                <div class="mt-2">
                                    <input type="text" id="name" autocomplete="given-name" wire:model.blur="form.name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-100 sm:max-w-xl sm:text-sm sm:leading-6">
                                    @error('form.name')
                                    <x-input-error :messages="$errors->get('form.name')" class="mt-1" />
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                                    Email
                                </label>
                                <div class="mt-2">
                                    <input type="email" id="email" autocomplete="email"
                                    wire:model.blur="form.email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-100 sm:max-w-xl sm:text-sm sm:leading-6">

                                    @error('form.email')
                                    <x-input-error :messages="$errors->get('form.email')" class="mt-1" />
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="class_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Class
                                </label>
                                <div class="mt-2">
                                    <select id="class_id" wire:model.live="form.class_id"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-100 sm:max-w-xl sm:text-sm sm:leading-6">
                                        <option>Select a class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{$class->id}}">
                                                {{$class->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('form.class_id')
                                    <x-input-error :messages="$errors->get('form.class_id')" class="mt-1" />
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="section_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Section
                                </label>
                                <div class="mt-2">
                                    <select id="section_id" wire:model="form.section_id"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-100 sm:max-w-xl sm:text-sm sm:leading-6">
                                        <option>Select a section</option>
                                        @foreach ($form->sections as $section)
                                            <option value="{{$section->id}}">
                                                {{ $section->name ." - ". $section->class->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('form.section_id')
                                    <x-input-error :messages="$errors->get('form.section_id')" class="mt-1" />
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="my-4 flex items-center justify-start gap-x-6">
                    <button type="submit" class="rounded-md bg-blue-500 px-7 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">
                        Save
                    </button>
                    <a href="{{route('students.index')}}" type="button" class="rounded-md bg-gray-300 px-5 py-2 text-sm font-semibold text-black shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300" wire:navigate >
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
