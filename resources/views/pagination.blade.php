<div>
    @if($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            
            <!-- previous  -->
            <span>
                @if($paginator->onFirstPage())
                    <span class="relative inline-flex items-center items-center px-4 py-2 text-sm font-medium text-gray-500 bg-red border border-gray-300  cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>
             <!-- numbers  -->
            @foreach($elements as $element)
                <ul class="flex">
                    @if(is_array($element))
                        @foreach($element as $page => $url)
                            @if($page == $paginator->currentPage())
                                <li wire:click="gotoPage({{$page}})" class="mx-2 w-10 px-2 py-1 text-center rounded broder shadow bg-white cursor-pointer">{{$page}}</li>
                            @else
                                <li wire:click="gotoPage({{$page}})" class="mx-2 w-10 px-2 py-1 text-center rounded broder shadow bg-red cursor-pointer">{{$page}}</li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            @endforeach
             <!-- next  -->
             <span>
                @if(!$paginator->hasMorePages())
                    <span class="relative inline-flex items-center items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                @else
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                @endif
            </span>
        </nav>
    @endif
</div>