
@if ($paginator->hasPages())
    <div class="row mt-5 pagination">
        <div class="col-lg-6 col-12 links text-lg-start text-center">
            <div class="w-100 page-wrapper">
                @if ($paginator->onFirstPage())
                    <span class="d-inline-block p-3 f-semimedium main-bg f-w-500">
                            <i class="fas fa-arrow-left"></i>
                    </span>
                @else
                    <a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                @endif
                @foreach ($elements as $element)

                    @if (is_string($element))
                        <span class="d-inline-block p-3 f-semimedium main-bg f-w-500">{{ $element }}</span>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="d-inline-block p-3 f-semimedium main-bg white-text f-w-500">{{ $page }}</span>
                            @else
                                <a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @else
                    <span class="d-inline-block p-3 f-semimedium main-bg f-w-500"><i class="fas fa-arrow-right"></i></span>
                @endif
            </div>
        </div>
    </div>
    </div>
@endif
