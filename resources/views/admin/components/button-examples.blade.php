{{--
    Simplified Button Component Examples for Admin Panel

    This file demonstrates how to use the simplified button component
    created for the admin panel. You can reference this when implementing
    buttons throughout the admin section.
--}}

{{-- Basic Primary Button --}}
<x-admin::button variant="primary" label="Click Me" />

{{-- Secondary Button --}}
<x-admin::button variant="secondary" label="Secondary Button" />

{{-- Success Button --}}
<x-admin::button variant="success" label="Save Changes" />

{{-- Danger Button --}}
<x-admin::button variant="danger" label="Delete Item" />

{{-- Warning Button --}}
<x-admin::button variant="warning" label="Warning Action" />

{{-- Info Button --}}
<x-admin::button variant="info" label="More Info" />

{{-- Outline Button --}}
<x-admin::button variant="outline" label="Outline Button" />

{{-- Ghost Button --}}
<x-admin::button variant="ghost" label="Ghost Button" />

{{-- Button with Custom Class --}}
<x-admin::button variant="primary" label="Full Width Button" class="w-full" />

{{-- Button with Alpine.js Click --}}
<x-admin::button variant="primary" label="Open Modal" alpineClick="openModal('create')" />

{{-- Button with Regular Onclick --}}
<x-admin::button variant="primary" label="Regular Click" onclick="alert('Hello!')" />

{{-- Submit Button --}}
<x-admin::button variant="primary" label="Submit Form" type="submit" />

{{--
    Usage Examples:

    {{-- Add Member Button --}}
<x-admin::button variant="primary" label="ADD" alpineClick="openModal('create')" class="mb-3" />

{{-- Cancel Button --}}
<x-admin::button variant="outline" label="Cancel" alpineClick="closeModal()" />

{{-- Save Button --}}
<x-admin::button variant="primary" label="Save" type="submit" />
--}}
