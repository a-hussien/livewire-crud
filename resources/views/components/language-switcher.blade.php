<ul class="flex items-center justify-end max-w-xs gap-2 text-sm leading-6">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="p-2 border-0 rounded-md shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset {{ LaravelLocalization::getCurrentLocale() !== $localeCode ? 'text-gray-700 bg-white ring-gray-300 focus:ring-gray-100 ' : 'text-black bg-blue-100 ring-blue-300 focus:ring-blue-100' }}">
            <a rel="alternate" hreflang="{{ $localeCode }}"
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
