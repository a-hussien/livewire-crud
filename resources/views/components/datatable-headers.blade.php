<tr>
    @foreach ($headers as $key => $header)
        <th wire:key="{{ $key }}" scope="col" wire:click="sortedBy('{{ $key }}')" class="px-6 py-4 {{ $key !== '' ? 'cursor-pointer' : '' }}">
            <div class="flex items-center justify-start gap-1">
                <span>{{$header}}</span>
                @unless ($key === '')
                <span class="opacity-50">
                    @if ($key !== $sortBy)
                        <x-heroicon-s-chevron-up-down />
                    @elseif($direction === 'ASC')
                        <x-heroicon-c-chevron-down class="opacity-100" />
                    @else
                        <x-heroicon-c-chevron-up class="opacity-100" />
                    @endif
                </span>
                @endunless
            </div>
        </th>
    @endforeach
</tr>
