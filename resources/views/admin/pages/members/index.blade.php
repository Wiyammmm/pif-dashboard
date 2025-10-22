<x-admin::layouts.app :title="__('Members')">

    <div class="relative" x-data="memberUI()">
        <div class="overflow-x-auto rounded-xl border shadow-sm p-4 bg-white" style="border-color: #C6D870;">

            {{-- Search and Filter Section --}}
            <div class="flex items-center justify-between px-4 pt-3">
                {{-- Show Per Page --}}
                <div class="flex items-center gap-2 mb-4">
                    <label for="per_page" class="text-xs text-gray-500">Show:</label>
                    <x-admin::select name="per_page" :options="[
                        '10' => '10',
                        '20' => '20',
                        '50' => '50',
                        '100' => '100',
                    ]" class="text-sm" size="sm" value="10"
                        dynamicWidth minWidth="w-16" />
                </div>


                {{-- Search and Filters Form --}}
                <form method="GET" class="flex flex-row gap-3 mb-3 flex-1 justify-center">
                    {{-- Search Input --}}
                    <div class="w-1/2">
                        <x-admin::search-input name="search"
                            placeholder="Search members by name, username, or email..." class="w-full" />
                    </div>

                    {{-- Sort By --}}
                    <div class="w-[130px]">
                        <x-admin::select name="sort" :options="[
                            'created_at' => 'Join Date',
                            'name' => 'Name',
                            'rank' => 'Rank',
                            'earnings' => 'Earnings',
                        ]" dynamicWidth minWidth="w-24" maxWidth="w-40"
                            value="created_at" />
                    </div>

                    {{-- Sort Direction --}}
                    <div class="w-[110px]">
                        <x-admin::select name="direction" :options="[
                            'desc' => 'Desc',
                            'asc' => 'Asc',
                        ]" dynamicWidth minWidth="w-20" maxWidth="w-24"
                            value="desc" />
                    </div>

                    {{-- Rank Filter --}}
                    <div class="w-[160px]">
                        <x-admin::select name="rank" :options="[
                            '' => 'All Ranks',
                            'diamond' => 'Diamond',
                            '3-star' => '3 Star',
                            'double-diamond' => 'Double Diamond',
                            'triple-diamond' => 'Triple Diamond',
                            'diamond-elite' => 'Diamond Elite',
                            'blue-diamond' => 'Blue Diamond',
                        ]" dynamicWidth minWidth="w-28"
                            maxWidth="w-48" />
                    </div>
                </form>

                {{-- Add Member Button --}}
                <x-admin::button variant="primary" label="ADD" alpineClick="openModal('create')" class="mb-4" />
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
                    @include('admin.pages.members.partials.rows')
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
            @include('admin.pages.members.partials.pagination')
        </div>

        {{-- Toast Notification --}}
        <div x-show="toast.show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed top-4 left-1/2 transform -translate-x-1/2 z-[9999] px-6 py-3 rounded-lg shadow-lg"
            :class="{
                'bg-green-500 text-white': toast.type === 'success',
                'bg-red-500 text-white': toast.type === 'error',
                'bg-blue-500 text-white': toast.type === 'info'
            }"
            style="display: none;">
            <p x-text="toast.message" class="font-medium"></p>
        </div>

        {{-- Delete Confirmation Modal --}}
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Backdrop -->
                <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity" aria-hidden="true"
                    @click="closeDeleteModal()">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>

                <!-- Spacer for centering -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal -->
                <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block align-bottom rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                    <!-- Modal Content -->
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 bg-white">
                        <div class="sm:flex sm:items-start">
                            <!-- Warning Icon -->
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                            </div>

                            <!-- Modal Text Content -->
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Delete Member
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to delete <strong class="text-gray-700"
                                            x-text="deleteTarget.name"></strong>? This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <!-- Confirm Button -->
                        <button type="button" @click="confirmDelete()"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Delete
                        </button>

                        <!-- Cancel Button -->
                        <button type="button" @click="closeDeleteModal()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide-over: Create/Edit Member --}}
        <div x-show="show" x-cloak class="fixed inset-0 z-[70] overflow-hidden" role="dialog" aria-modal="true"
            aria-labelledby="slide-over-title" style="display: none;">
            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-black/30" @click="closeModal()" x-show="show"
                x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

            <div class="absolute inset-y-0 right-0 flex max-w-full">
                <div class="w-screen max-w-md" x-transition:enter="transform transition ease-in-out duration-300"
                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-300"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                    <div class="h-full flex flex-col bg-white shadow-xl border-l" style="border-color: #C6D870;">
                        <div class="px-4 py-4 flex items-center justify-between border-b"
                            style="border-color: #C6D870;">
                            <h2 class="text-lg font-semibold" id="slide-over-title"
                                x-text="mode === 'create' ? 'Add Member' : 'Edit Member'"></h2>
                            <button type="button" class="text-gray-500 hover:text-gray-700" @click="closeModal()"
                                aria-label="Close panel">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M6.225 4.811a.75.75 0 011.06 0L12 9.525l4.715-4.714a.75.75 0 111.06 1.06L13.06 10.586l4.715 4.714a.75.75 0 11-1.06 1.06L12 11.646l-4.715 4.714a.75.75 0 11-1.06-1.06l4.714-4.715-4.714-4.714a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex-1 overflow-y-auto p-4">
                            <form @submit.prevent="submitForm()" class="space-y-4">
                                {{-- Name --}}
                                <div>
                                    <x-admin::form-input name="name" label="Name" placeholder="Full name"
                                        x-model="form.name" />
                                    <template x-if="errors.name">
                                        <p class="mt-1 text-sm text-red-600" x-text="errors.name[0] || errors.name">
                                        </p>
                                    </template>
                                </div>

                                {{-- Username --}}
                                <div>
                                    <x-admin::form-input name="username" label="Username" placeholder="Username"
                                        x-model="form.username" />
                                    <template x-if="errors.username">
                                        <p class="mt-1 text-sm text-red-600"
                                            x-text="errors.username[0] || errors.username"></p>
                                    </template>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <x-admin::form-input name="email" type="email" label="Email"
                                        placeholder="email@example.com" x-model="form.email" />
                                    <template x-if="errors.email">
                                        <p class="mt-1 text-sm text-red-600" x-text="errors.email[0] || errors.email">
                                        </p>
                                    </template>
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <x-admin::form-input name="phone" label="Phone" placeholder="Phone number"
                                        x-model="form.phone" />
                                    <template x-if="errors.phone">
                                        <p class="mt-1 text-sm text-red-600" x-text="errors.phone[0] || errors.phone">
                                        </p>
                                    </template>
                                </div>

                                {{-- Rank --}}
                                <div>
                                    <x-admin::select name="rank" label="Rank" placeholder="Select rank"
                                        :options="[
                                            '' => 'Select rank',
                                            'diamond' => 'Diamond',
                                            '3-star' => '3 Star',
                                            'double-diamond' => 'Double Diamond',
                                            'triple-diamond' => 'Triple Diamond',
                                            'diamond-elite' => 'Diamond Elite',
                                            'blue-diamond' => 'Blue Diamond',
                                        ]" x-model="form.rank" />
                                    <template x-if="errors.rank">
                                        <p class="mt-1 text-sm text-red-600" x-text="errors.rank[0] || errors.rank">
                                        </p>
                                    </template>
                                </div>

                                {{-- Team --}}
                                <div>
                                    <x-admin::form-input name="team" label="Team" placeholder="Team name"
                                        x-model="form.team" />
                                    <template x-if="errors.team">
                                        <p class="mt-1 text-sm text-red-600" x-text="errors.team[0] || errors.team">
                                        </p>
                                    </template>
                                </div>

                                {{-- Earnings and TGR Points --}}
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <x-admin::form-input name="earnings" type="number" label="Earnings"
                                            placeholder="0.00" step="0.01" x-model="form.earnings" />
                                        <template x-if="errors.earnings">
                                            <p class="mt-1 text-sm text-red-600"
                                                x-text="errors.earnings[0] || errors.earnings"></p>
                                        </template>
                                    </div>
                                    <div>
                                        <x-admin::form-input name="tgr_points" type="number" label="TGR Points"
                                            placeholder="0" x-model="form.tgr_points" />
                                        <template x-if="errors.tgr_points">
                                            <p class="mt-1 text-sm text-red-600"
                                                x-text="errors.tgr_points[0] || errors.tgr_points"></p>
                                        </template>
                                    </div>
                                </div>

                                <div class="pt-2 flex items-center justify-end gap-2">
                                    <x-admin::button variant="outline" label="Cancel" alpineClick="closeModal()" />
                                    <x-admin::button variant="primary" label="Save" type="submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function memberUI() {
            return {
                show: false,
                showDeleteModal: false,
                mode: 'create', // 'create' or 'edit'
                isSubmitting: false,
                deleteTarget: {
                    id: null,
                    name: ''
                },
                form: {
                    id: null,
                    name: '',
                    username: '',
                    email: '',
                    phone: '',
                    rank: '',
                    team: '',
                    earnings: '',
                    tgr_points: ''
                },
                errors: {},
                toast: {
                    show: false,
                    message: '',
                    type: 'success' // 'success', 'error', 'info'
                },

                init() {
                    // Expose globally for external access
                    window.memberUIState = this;
                },

                openModal(mode, memberOrId = null) {
                    this.mode = mode;
                    this.errors = {};

                    if (mode === 'create') {
                        // Reset form for new member
                        this.form = {
                            id: null,
                            name: '',
                            username: '',
                            email: '',
                            phone: '',
                            rank: '',
                            team: '',
                            earnings: '',
                            tgr_points: ''
                        };
                    } else if (mode === 'edit') {
                        // Load member data
                        if (typeof memberOrId === 'object') {
                            // Member object passed directly
                            this.form = {
                                ...memberOrId
                            };
                        } else {
                            // Member ID passed, fetch via AJAX
                            this.fetchMember(memberOrId);
                        }
                    }

                    this.show = true;
                },

                closeModal() {
                    this.show = false;
                    this.errors = {};
                },

                async fetchMember(id) {
                    try {
                        const response = await fetch(`/admin/members/${id}`, {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                            }
                        });

                        if (response.ok) {
                            const data = await response.json();
                            this.form = {
                                ...data.member
                            };
                        } else {
                            this.showToast('Failed to load member data', 'error');
                        }
                    } catch (error) {
                        console.error('Error fetching member:', error);
                        this.showToast('Error loading member data', 'error');
                    }
                },

                async submitForm() {
                    if (this.isSubmitting) return;

                    this.isSubmitting = true;
                    this.errors = {};

                    const url = this.mode === 'create' ?
                        '/admin/members' :
                        `/admin/members/${this.form.id}`;

                    const method = this.mode === 'create' ? 'POST' : 'PUT';

                    try {
                        const response = await fetch(url, {
                            method: method,
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                            },
                            body: JSON.stringify(this.form)
                        });

                        const data = await response.json();

                        if (response.status === 422) {
                            // Validation errors
                            this.errors = data.errors || {};
                            this.isSubmitting = false;
                            return;
                        }

                        if (response.ok) {
                            // Success
                            this.showToast(
                                this.mode === 'create' ? 'Member added successfully' :
                                'Member updated successfully',
                                'success'
                            );
                            this.closeModal();

                            // Reload the page to show updated data
                            setTimeout(() => {
                                window.location.reload();
                            }, 500);
                        } else {
                            // Other errors
                            this.showToast(data.message || 'An error occurred', 'error');
                        }
                    } catch (error) {
                        console.error('Error submitting form:', error);
                        this.showToast('Network error occurred', 'error');
                    } finally {
                        this.isSubmitting = false;
                    }
                },

                showToast(message, type = 'success') {
                    this.toast = {
                        show: true,
                        message: message,
                        type: type
                    };

                    // Auto-hide after 3 seconds
                    setTimeout(() => {
                        this.toast.show = false;
                    }, 3000);
                },

                openDeleteModal(id, name) {
                    this.deleteTarget = {
                        id: id,
                        name: name
                    };
                    this.showDeleteModal = true;
                },

                closeDeleteModal() {
                    this.showDeleteModal = false;
                    this.deleteTarget = {
                        id: null,
                        name: ''
                    };
                },

                async confirmDelete() {
                    if (!this.deleteTarget.id) return;

                    try {
                        const response = await fetch(`/admin/members/${this.deleteTarget.id}`, {
                            method: 'DELETE',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                            }
                        });

                        const data = await response.json();

                        if (response.ok) {
                            this.showToast('Member deleted successfully', 'success');
                            this.closeDeleteModal();

                            // Reload the page to show updated data
                            setTimeout(() => {
                                window.location.reload();
                            }, 500);
                        } else {
                            this.showToast(data.message || 'Failed to delete member', 'error');
                        }
                    } catch (error) {
                        console.error('Error deleting member:', error);
                        this.showToast('Network error occurred', 'error');
                    }
                }
            };
        }
    </script>

</x-admin::layouts.app>
