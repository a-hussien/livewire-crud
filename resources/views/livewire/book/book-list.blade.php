<div class="container mx-auto flex flex-col">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books List') }}
        </h2>
        <small class="text-blue-900 drop-shadow">Infinite Scroll Example</small>
    </x-slot>

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 my-4">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Published Date</th>
                        </tr>
                    </thead>
                    <tbody wire:loading.class="animate-pulse">
                        @forelse ($books as $book)
                        <tr wire:key="{{ $book->id }}" class="border-b transition duration-300 ease-in-out hover:bg-blue-50">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $book->id }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $book->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $book->published_date }}</td>
                        </tr>
                        @empty
                        <tr class="border-b transition duration-300 ease-in-out hover:bg-blue-100">
                            <td colspan="3" class="whitespace-nowrap px-6 py-4 font-medium text-center text-slate-500">No Data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div x-intersect="$wire.loadMore()" class="mx-4 md:mx-0 my-4">
                @if ($books->count() < $count)
                    <span class="text-blue-500 px-7 py-2 text-sm font-semibold drop-shadow-sm">
                        Loading More...
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
