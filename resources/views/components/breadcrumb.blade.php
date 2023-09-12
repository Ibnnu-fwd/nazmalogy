<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
    aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach ($items as $index => $item)
            <li class="inline-flex items-center">
                @if ($index > 0)
                    <div class="flex items-center">
                        <ion-icon name="chevron-forward-outline" class="w-3 h-3 text-gray-400"></ion-icon>
                    </div>
                @endif
                @if ($item['link'])
                    <a href="{{ $item['link'] }}"
                        class="inline-flex items-center mini-text font-normal text-gray-700 hover:text-blue-600 ml-2">
                        {{ $item['text'] }}
                    </a>
                @else
                    <span class="mini-text font-normal text-gray-500 dark:text-gray-400 ml-2">{{ $item['text'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
