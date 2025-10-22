@php
    // Mock pagination data for demo (replace with actual $members pagination)
    $current = 1;
    $last = 5;
    $start = max(2, $current - 2);
    $end = min($last - 1, $current + 2);
    $onFirstPage = true;
    $hasMorePages = true;
@endphp

<nav class="mt-4 flex items-center justify-between px-4 py-3 border-t" style="border-color: #C6D870;"
    aria-label="Pagination">
    <div class="text-sm text-gray-500">
        Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span
            class="font-medium">6</span> results
    </div>

    <ul class="inline-flex items-center gap-1 text-sm select-none">
        {{-- Previous Button --}}
        <li>
            @if ($onFirstPage)
                <span class="px-2.5 py-1.5 text-gray-300 cursor-default">‹</span>
            @else
                <a href="#" class="px-2.5 py-1.5 rounded transition-colors" style="color: #556B2F;"
                    onmouseover="this.style.backgroundColor='#EFF5D2'"
                    onmouseout="this.style.backgroundColor='transparent'">‹</a>
            @endif
        </li>

        {{-- First Page --}}
        <li>
            @if ($current === 1)
                <span class="px-2.5 py-1.5 rounded font-semibold"
                    style="background-color: #8FA31E; color: #fff;">1</span>
            @else
                <a href="#" class="px-2.5 py-1.5 rounded transition-colors" style="color: #556B2F;"
                    onmouseover="this.style.backgroundColor='#EFF5D2'"
                    onmouseout="this.style.backgroundColor='transparent'">1</a>
            @endif
        </li>

        {{-- Ellipsis if needed --}}
        @if ($start > 2)
            <li><span class="px-2 py-1 text-gray-400">…</span></li>
        @endif

        {{-- Middle Pages --}}
        @for ($i = $start; $i <= $end; $i++)
            <li class="hidden sm:inline-block">
                @if ($current === $i)
                    <span class="px-2.5 py-1.5 rounded font-semibold"
                        style="background-color: #8FA31E; color: #fff;">{{ $i }}</span>
                @else
                    <a href="#" class="px-2.5 py-1.5 rounded transition-colors" style="color: #8FA31E;"
                        onmouseover="this.style.backgroundColor='#9eeb9c30'"
                        onmouseout="this.style.backgroundColor='transparent'">{{ $i }}</a>
                @endif
            </li>
        @endfor

        {{-- Ellipsis if needed --}}
        @if ($end < $last - 1)
            <li><span class="px-2 py-1 text-gray-400">…</span></li>
        @endif

        {{-- Last Page --}}
        @if ($last > 1)
            <li>
                @if ($current === $last)
                    <span class="px-2.5 py-1.5 rounded font-semibold"
                        style="background-color: #8FA31E; color: #fff;">{{ $last }}</span>
                @else
                    <a href="#" class="px-2.5 py-1.5 rounded transition-colors" style="color: #8FA31E;"
                        onmouseover="this.style.backgroundColor='#9eeb9c30'"
                        onmouseout="this.style.backgroundColor='transparent'">{{ $last }}</a>
                @endif
            </li>
        @endif

        {{-- Next Button --}}
        <li>
            @if ($hasMorePages)
                <a href="#" class="px-2.5 py-1.5 rounded transition-colors" style="color: #556B2F;"
                    onmouseover="this.style.backgroundColor='#EFF5D2'"
                    onmouseout="this.style.backgroundColor='transparent'">›</a>
            @else
                <span class="px-2.5 py-1.5 text-gray-300 cursor-default">›</span>
            @endif
        </li>
    </ul>
</nav>
