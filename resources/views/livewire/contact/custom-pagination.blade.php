@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" class=" flex flex-row items-center w-full justify-between ">

        {{-- Additional Info Section --}}
        <div>
            <div>
                <p class="text-sm text-gray-800 leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
        <div>
            <ul class="inline-flex items-center -space-x-px">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true">
                        <span
                            class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed leading-5 rounded-l-md">
                            &lsaquo;
                        </span>
                    </li>
                @else
                    <li>
                        <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                            aria-label="@lang('pagination.previous')"
                            class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:bg-gray-100 rounded-l-md">
                            &lsaquo;
                        </button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true">
                            <span
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-not-allowed leading-5">
                                {{ $element }}
                            </span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page">
                                    <span
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 leading-5">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:bg-gray-100">
                                        {{ $page }}
                                    </button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                            aria-label="@lang('pagination.next')"
                            class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:bg-gray-100 rounded-r-md">
                            &rsaquo;
                        </button>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true">
                        <span
                            class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed leading-5 rounded-r-md">
                            &rsaquo;
                        </span>
                    </li>
                @endif
            </ul>
        </div>

    </nav>
@endif
