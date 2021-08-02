<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" wire:ignore.self>
    @if ($paginator->hasPages())
    <ul class="pagination">
        @if (!$paginator->onFirstPage())
        <li>
            <a class="pagination__link" wire:click="gotoPage({{ 1 }})">    
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
            </a>
        </li>
        <li>
            <a class="pagination__link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </a>
        </li>
        @else 
        <li>
            <a class="pagination__link disabled">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
            </a>
        </li>
        <li>
            <a class="pagination__link disabled">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </a>
        </li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li> <a class="pagination__link">{{ $element }}</a> </li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li> <a class="pagination__link pagination__link--active" wire:click="gotoPage({{ $page }})">{{ $page }}</a> </li>
                    @else
                        <li> <a class="pagination__link" wire:click="gotoPage({{ $page }})">{{ $page }}</a> </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li>
            <a class="pagination__link" wire:click="nextPage" wire:loading.attr="disabled" rel="prev"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                {{-- <i class="w-4 h-4" data-feather="chevron-right"></i>  --}}
            </a>
        </li>
        <li>
            <a class="pagination__link" wire:click="nextPage" wire:loading.attr="disabled" rel="prev"> 
                <i wire:ignore class="w-4 h-4" data-feather="chevrons-right"></i> 
            </a>
        </li>
        @endif
    </ul>
    @endif
    {{-- <select class="w-20 form-select box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
    </select> --}}
</div>