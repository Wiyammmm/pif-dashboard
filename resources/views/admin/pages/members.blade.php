<x-admin::layouts.app :title="__('Members')">

    <div class="relative">
        <div class="overflow-x-auto rounded-xl border shadow-sm p-4 bg-white">

            {{-- Search and Filter Section --}}
            <div class="flex items-center justify-between px-4 pt-3">
                {{-- Show Per Page --}}
                <div class="flex items-center gap-2 mb-4">
                    <label for="per_page" class="text-xs text-gray-500">Show:</label>
                    <select id="per_page" name="per_page"
                        class="w-[60px] rounded border px-2 py-1 text-sm text-gray-900 focus:outline-none focus:ring-2 transition"
                        style="border-color: #C6D870; focus:ring-color: #8FA31E;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                {{-- Search and Filters Form --}}
                <form method="GET" class="flex flex-row gap-3 mb-3 flex-1 justify-center">
                    {{-- Search Input --}}
                    <div class="w-1/2">
                        <input name="search" placeholder="Search members by name, username, or email..."
                            class="w-full rounded-lg border px-3 py-2 text-gray-900 placeholder:text-gray-400 focus:outline-none placeholder:px-2 focus:ring-4 transition"
                            style="border-color: #C6D870; focus:ring-color: #8FA31E;" />
                    </div>

                    {{-- Sort By --}}
                    <div class="w-[130px]">
                        <select name="sort"
                            class="w-full rounded-lg border px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 transition"
                            style="border-color: #C6D870; focus:ring-color: #8FA31E;">
                            <option value="created_at">Join Date</option>
                            <option value="name">Name</option>
                            <option value="rank">Rank</option>
                            <option value="earnings">Earnings</option>
                        </select>
                    </div>

                    {{-- Sort Direction --}}
                    <div class="w-[110px]">
                        <select name="direction"
                            class="w-full rounded-lg border px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 transition"
                            style="border-color: #C6D870; focus:ring-color: #8FA31E;">
                            <option value="desc">Desc</option>
                            <option value="asc">Asc</option>
                        </select>
                    </div>

                    {{-- Rank Filter --}}
                    <div class="w-[160px]">
                        <select name="rank"
                            class="w-full rounded-lg border px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 transition"
                            style="border-color: #C6D870; focus:ring-color: #8FA31E;">
                            <option value="">All Ranks</option>
                            <option value="diamond">Diamond</option>
                            <option value="3-star">3 Star</option>
                            <option value="double-diamond">Double Diamond</option>
                            <option value="triple-diamond">Triple Diamond</option>
                            <option value="diamond-elite">Diamond Elite</option>
                            <option value="blue-diamond">Blue Diamond</option>
                        </select>
                    </div>
                </form>

                {{-- Add Member Button --}}
                <button type="button"
                    class="mb-3 inline-flex items-center gap-2 rounded-lg text-white font-medium px-2 py-2 transition hover:opacity-90"
                    style="background-color: #556B2F;">

                    + ADD
                </button>
            </div>

            {{-- Table --}}
            <table class="min-w-full mt-2">
                <thead>
                    <tr class="text-left text-xs uppercase tracking-wide text-white" style="background-color: #8FA31E;">
                        <th class="px-4 py-3 border-b rounded-tl-lg" style="border-color: #C6D870;">Member</th>
                        <th class="px-4 py-3 border-b" style="border-color: #C6D870;">Username</th>
                        <th class="px-4 py-3 border-b" style="border-color: #C6D870;">Rank</th>
                        <th class="px-4 py-3 border-b" style="border-color: #C6D870;">Earnings</th>
                        <th class="px-4 py-3 border-b" style="border-color: #C6D870;">TGR Points</th>
                        <th class="px-4 py-3 border-b" style="border-color: #C6D870;">Team</th>
                        <th class="px-4 py-3 border-b" style="border-color: #C6D870;">Join Date</th>
                        <th class="px-4 py-3 border-b text-center rounded-tr-lg" style="border-color: #C6D870;">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800">
                    {{-- Test Data Row 1 --}}
                    <tr class="border-b hover:bg-[#EFF5D2] transition-colors" style="border-color: #C6D87050;">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=8FA31E&color=fff"
                                    class="w-8 h-8 rounded-full" alt="John Doe">
                                <div>
                                    <div class="font-medium text-gray-900">John Doe</div>
                                    <div class="text-xs text-gray-500">john.doe@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">johndoe</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Diamond
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">₱45,230.00</td>
                        <td class="px-4 py-3">15,420</td>
                        <td class="px-4 py-3">Team Alpha</td>
                        <td class="px-4 py-3 text-gray-500">Jan 15, 2024</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Test Data Row 2 --}}
                    <tr class="border-b hover:bg-[#EFF5D2] transition-colors" style="border-color: #C6D87050;">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=8FA31E&color=fff"
                                    class="w-8 h-8 rounded-full" alt="Jane Smith">
                                <div>
                                    <div class="font-medium text-gray-900">Jane Smith</div>
                                    <div class="text-xs text-gray-500">jane.smith@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">janesmith</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                3 Star
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">₱38,750.00</td>
                        <td class="px-4 py-3">12,890</td>
                        <td class="px-4 py-3">Team Beta</td>
                        <td class="px-4 py-3 text-gray-500">Feb 20, 2024</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Test Data Row 3 --}}
                    <tr class="border-b hover:bg-[#EFF5D2] transition-colors" style="border-color: #C6D87050;">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=8FA31E&color=fff"
                                    class="w-8 h-8 rounded-full" alt="Mike Johnson">
                                <div>
                                    <div class="font-medium text-gray-900">Mike Johnson</div>
                                    <div class="text-xs text-gray-500">mike.j@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">mikej</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                Double Diamond
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">₱29,450.00</td>
                        <td class="px-4 py-3">9,560</td>
                        <td class="px-4 py-3">Team Gamma</td>
                        <td class="px-4 py-3 text-gray-500">Mar 10, 2024</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Test Data Row 4 --}}
                    <tr class="border-b hover:bg-[#EFF5D2] transition-colors" style="border-color: #C6D87050;">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Williams&background=8FA31E&color=fff"
                                    class="w-8 h-8 rounded-full" alt="Sarah Williams">
                                <div>
                                    <div class="font-medium text-gray-900">Sarah Williams</div>
                                    <div class="text-xs text-gray-500">sarah.w@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">sarahw</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-violet-100 text-violet-800">
                                Triple Diamond
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">₱18,920.00</td>
                        <td class="px-4 py-3">6,720</td>
                        <td class="px-4 py-3">Team Alpha</td>
                        <td class="px-4 py-3 text-gray-500">Apr 05, 2024</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Test Data Row 5 --}}
                    <tr class="border-b hover:bg-[#EFF5D2] transition-colors" style="border-color: #C6D87050;">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=David+Brown&background=8FA31E&color=fff"
                                    class="w-8 h-8 rounded-full" alt="David Brown">
                                <div>
                                    <div class="font-medium text-gray-900">David Brown</div>
                                    <div class="text-xs text-gray-500">david.b@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">davidb</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                Diamond Elite
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">₱12,340.00</td>
                        <td class="px-4 py-3">4,280</td>
                        <td class="px-4 py-3">Team Delta</td>
                        <td class="px-4 py-3 text-gray-500">May 18, 2024</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Test Data Row 6 --}}
                    <tr class="hover:bg-[#EFF5D2] transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=8FA31E&color=fff"
                                    class="w-8 h-8 rounded-full" alt="Emily Davis">
                                <div>
                                    <div class="font-medium text-gray-900">Emily Davis</div>
                                    <div class="text-xs text-gray-500">emily.d@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">emilyd</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                Blue Diamond
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">₱41,200.00</td>
                        <td class="px-4 py-3">13,950</td>
                        <td class="px-4 py-3">Team Beta</td>
                        <td class="px-4 py-3 text-gray-500">Jun 22, 2024</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 rounded transition">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>

                {{-- No Data Placeholder --}}
                <tbody id="no-data-placeholder" class="text-sm text-gray-800" style="display: none;">
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <div class="text-gray-500">
                                    <p class="text-lg font-medium">No members found</p>
                                    <p class="text-sm">Try adjusting your search or filters</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- Pagination --}}
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
                                <a href="#" class="px-2.5 py-1.5 rounded transition-colors"
                                    style="color: #8FA31E;" onmouseover="this.style.backgroundColor='#9eeb9c30'"
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
                                <a href="#" class="px-2.5 py-1.5 rounded transition-colors"
                                    style="color: #8FA31E;" onmouseover="this.style.backgroundColor='#9eeb9c30'"
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
        </div>
    </div>

</x-admin::layouts.app>
