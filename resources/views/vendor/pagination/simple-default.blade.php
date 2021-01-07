@if ($paginator->hasPages())
    <nav>
        <div class="flex rounded">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="py-2 px-4 leading-tight bg-white border border-gray-200 text-gray-700 border-l-0 mr-0 rounded-r" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">السابق</span>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-gray-700 border-l-0 rounded-r hover:bg-gray-800 hover:text-white">
                    <span rel="prev" aria-label="@lang('pagination.previous')">السابق</span>
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-gray-700 border-l hover:bg-gray-800 hover:text-white rounded-l">
                    <span rel="next" aria-label="@lang('pagination.next')">التالي</span>
                </a>
            @else
                <a class="py-2 px-4 leading-tight bg-white border border-gray-200 text-gray-700 border-l" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">التالي</span>
                </a>
            @endif
        </div>
    </nav>
@endif
