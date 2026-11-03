@if ($paginator->hasPages())
    <nav class="pagination-wrapper" role="navigation" aria-label="Navigasi Halaman">
        <div class="pagination-info">
            Menampilkan <strong>{{ $paginator->firstItem() }}</strong> - <strong>{{ $paginator->lastItem() }}</strong> dari <strong>{{ $paginator->total() }}</strong> data
        </div>

        <div class="pagination-links">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="page-link-btn disabled" aria-disabled="true">Sebelumnya</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link-btn" rel="prev">Sebelumnya</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="page-link-btn dots" aria-disabled="true">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-link-btn active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-link-btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link-btn" rel="next">Selanjutnya</a>
            @else
                <span class="page-link-btn disabled" aria-disabled="true">Selanjutnya</span>
            @endif
        </div>
    </nav>
@endif
