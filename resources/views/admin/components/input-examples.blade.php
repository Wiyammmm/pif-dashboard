{{--
    Input Component Examples for Admin Panel

    This file demonstrates how to use the various input components
    created for the admin panel. You can reference this when implementing
    forms throughout the admin section.
--}}

{{-- Basic Search Input (matches your current styling) --}}
<x-admin::search-input name="search" placeholder="Search members by name, username, or email..." class="w-1/2" />

{{-- Form Input with Label and Validation --}}
<x-admin::form-input name="email" type="email" label="Email Address" placeholder="Enter email address" required
    help="We'll never share your email with anyone else." />

{{-- Form Input with Icon --}}
<x-admin::form-input name="username" label="Username" placeholder="Enter username" icon="fas fa-user" iconPosition="left"
    required />

{{-- Form Input with Error State --}}
<x-admin::form-input name="password" type="password" label="Password" placeholder="Enter password"
    error="Password must be at least 8 characters" required />

{{-- Select Dropdown --}}
<x-admin::select name="sort" label="Sort By" placeholder="Select sorting option" :options="[
    'name' => 'Name',
    'email' => 'Email',
    'created_at' => 'Date Created',
]"
    class="w-[130px]" />

{{-- Auto Width Select --}}
<x-admin::select name="status" :options="[
    'active' => 'Active',
    'inactive' => 'Inactive',
    'pending' => 'Pending',
]" autoWidth minWidth="w-20" maxWidth="w-32" />

{{-- Dynamic Width Select (resizes based on selected value) --}}
<x-admin::select name="priority" :options="[
    'low' => 'Low',
    'medium' => 'Medium Priority',
    'high' => 'High Priority',
    'urgent' => 'Urgent - Immediate Action Required',
]" dynamicWidth minWidth="w-20" maxWidth="w-64" />

{{-- Small Size Input --}}
<x-admin::form-input name="code" label="Verification Code" placeholder="Enter code" size="sm" class="w-32" />

{{-- Large Size Input --}}
<x-admin::form-input name="title" label="Page Title" placeholder="Enter page title" size="lg" />

{{-- Disabled Input --}}
<x-admin::form-input name="id" label="User ID" value="12345" disabled />

{{-- Readonly Input --}}
<x-admin::form-input name="created_at" label="Created At" value="2024-01-15 10:30:00" readonly />

{{-- Textarea (using form-input with type="textarea" or create separate textarea component) --}}
<x-admin::form-input name="description" type="textarea" label="Description" placeholder="Enter description"
    rows="4" />

{{--
    Usage in your members/index.blade.php:

    Replace this:
    <input name="search" placeholder="Search members by name, username, or email..."
        class="w-full rounded-lg border px-3 py-2 text-gray-900 placeholder:text-gray-400 focus:outline-none placeholder:px-2 focus:ring-4 transition"
        style="border-color: #C6D870; focus:ring-color: #8FA31E;" />

    With this:
    <x-admin::search-input
        name="search"
        placeholder="Search members by name, username, or email..."
        class="w-full"
    />
--}}
