{{-- Test Data Row 1 --}}
<tr class="border-b hover:bg-[#EFF5D2] transition-colors" style="border-color: #C6D87050;">
    <td class="px-4 py-3">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name=John+Doe&background=8FA31E&color=fff" class="w-8 h-8 rounded-full"
                alt="John Doe">
            <div>
                <div class="font-medium text-gray-900">John Doe</div>
                <div class="text-xs text-gray-500">john.doe@example.com</div>
            </div>
        </div>
    </td>
    <td class="px-4 py-3">johndoe</td>
    <td class="px-4 py-3">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
            Diamond
        </span>
    </td>
    <td class="px-4 py-3 font-semibold">₱45,230.00</td>
    <td class="px-4 py-3">15,420</td>
    <td class="px-4 py-3">Team Alpha</td>
    <td class="px-4 py-3 text-gray-500">Jan 15, 2024</td>
    <td class="px-4 py-3">
        <div class="flex items-center justify-center gap-2">
            <button
                @click="window.memberUIState && window.memberUIState.openModal('edit', {
                id: 1,
                name: 'John Doe',
                username: 'johndoe',
                email: 'john.doe@example.com',
                phone: '+1234567890',
                rank: 'diamond',
                team: 'Team Alpha',
                earnings: '45230.00',
                tgr_points: '15420'
            })"
                class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <button class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <button class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <button class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <button class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <button class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
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
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <button class="p-1 hover:bg-gray-100 rounded transition">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </button>
        </div>
    </td>
</tr>
