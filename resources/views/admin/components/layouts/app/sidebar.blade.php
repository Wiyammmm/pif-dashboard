<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white">
    <flux:sidebar sticky stashable class="border-e border-[#C6D870] bg-[#EFF5D2]">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}"
            class="flex items-center justify-center space-x-2 rtl:space-x-reverse bg-white w-full py-4.5 px-4"
            wire:navigate>
            <x-admin::app-logo />
        </a>

        <flux:navlist variant="outline" class="px-4">
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    class="@class(['bg-[#C6D870]' => request()->routeIs('dashboard')])" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('admin.members')"
                    :current="request()->routeIs('admin.members')" class="@class(['bg-[#C6D870]' => request()->routeIs('admin.members')])" wire:navigate>
                    {{ __('Members') }}</flux:navlist.item>
                <flux:navlist.item icon="folder-git-2" :href="route('admin.reports')"
                    :current="request()->routeIs('admin.reports')" class="@class(['bg-[#C6D870]' => request()->routeIs('admin.reports')])" wire:navigate>
                    {{ __('Reports') }}</flux:navlist.item>
                <flux:navlist.item icon="folder" :href="route('admin.inventory')"
                    :current="request()->routeIs('admin.inventory')" class="@class(['bg-[#C6D870]' => request()->routeIs('admin.inventory')])" wire:navigate>
                    {{ __('Inventory') }}
                </flux:navlist.item>
                <flux:navlist.item icon="layout-grid" :href="route('admin.pos')"
                    :current="request()->routeIs('admin.pos')" class="@class(['bg-[#C6D870]' => request()->routeIs('admin.pos')])" wire:navigate>
                    {{ __('POS') }}</flux:navlist.item>
                <flux:navlist.item icon="calendar" :href="route('admin.deadline')"
                    :current="request()->routeIs('admin.deadline')" class="@class(['bg-[#C6D870]' => request()->routeIs('admin.deadline')])" wire:navigate>
                    {{ __('Deadline') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>


        {{-- <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist> --}}

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" data-test="sidebar-menu-button" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('admin.settings')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        @php
            $routeName = request()->route()?->getName();
            $pageTitle =
                $title ??
                match ($routeName) {
                    'admin.members' => __('Members'),
                    'admin.reports' => __('Reports'),
                    'admin.inventory' => __('Inventory'),
                    'admin.pos' => __('Point of Sale'),
                    'admin.deadline' => __('Deadlines'),
                    'dashboard' => __('Dashboard'),
                    default => null,
                };
            $pageDescription = match ($routeName) {
                'admin.members' => __('Monitor all member accounts, earnings, and ranks'),
                'admin.reports' => __('Analyze platform metrics and export summaries'),
                'admin.inventory' => __('Track stock levels, SKUs, and adjustments'),
                'admin.pos' => __('Process orders and payments'),
                'admin.deadline' => __('Track tasks, due dates, and reminders'),
                'dashboard' => __('Overview and quick stats'),
                default => null,
            };
        @endphp

        @if ($pageTitle)
            <div class="mt-2 mb-3 px-1">
                <span class="text-3xl font-semibold">{{ $pageTitle }}</span>
                @if ($pageDescription)
                    <flux:subheading class="text-sm">{{ $pageDescription }}</flux:subheading>
                @endif
            </div>
        @endif
        <flux:spacer />
        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('admin.settings')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
