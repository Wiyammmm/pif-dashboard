<x-admin::layouts.app :title="__('Member')">
    <div class="flex items-center justify-center w-full h-[60vh]">
        <div class="text-center space-y-2">
            <flux:heading size="lg">{{ __('Member') }}</flux:heading>
            <flux:subheading>{{ __('Manage members, profiles, and access.') }}</flux:subheading>
            <flux:callout variant="warning" icon="wrench-screwdriver" class="mt-4">
                {{ __('This page is under development') }}
            </flux:callout>
        </div>
    </div>
</x-admin::layouts.app>
