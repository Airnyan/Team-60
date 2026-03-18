<x-layout>
    <x-slot:title>
        Admin – Dashboard
    </x-slot:title>

    <div class="container mx-auto py-10 text-white">

        <h1 class="text-3xl font-bold text-green-400 mb-8">
            Admin Dashboard
        </h1>

        <p class="mb-10 text-green-300">
            Welcome back, {{ auth()->user()->name }}.  
            Use the panel below to manage the system.
        </p>

        <!-- Alert For Ben-->
        <div role="alert" class="alert alert-error mb-5">
            <span class="material-symbols-outlined">warning</span>
            <span>Low Stock!!</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Manage Products -->
            <div class="hover-3d">
            <a href="{{ route('admin.products') }}"
               class="bg-black border border-green-500 rounded-lg p-6 hover:bg-gray-900 transition">
                <h2 class="text-xl font-bold text-green-400 mb-2">
                    Manage Products
                </h2>
                <p class="text-green-300">
                    View, edit, and manage store products.
                </p>
            </a>
            </div>

            <!-- Edit Users (Admins + Super Admins) -->
            <div class="hover-3d">
            <a href="{{ route('admin.users.indexuser') }}"
               class="bg-black border border-green-500 rounded-lg p-6 hover:bg-gray-900 transition">
                <h2 class="text-xl font-bold text-green-400 mb-2">
                    Edit User Details
                </h2>
                <p class="text-green-300">
                    Edit customer accounts and reset passwords.
                </p>
            </a>
            </div>

            <div class="hover-3d">
            <a href="{{ route('admin.orders') }}"
               class="bg-black border border-green-500 rounded-lg p-6 hover:bg-gray-900 transition">
                <h2 class="text-xl font-bold text-green-400 mb-2">
                    Edit Order Status
                </h2>
                <p class="text-green-300">
                    Update the status of existing orders.
                </p>
            </a>
            </div>

            <!-- Super Admin Only -->
            @if(auth()->user()->role === 'super_admin')
            <div class="hover-3d">
            <a href="{{ route('admin.users') }}"
               class="bg-black border border-purple-500 rounded-lg p-6 hover:bg-gray-900 transition">
                <h2 class="text-xl font-bold text-purple-400 mb-2">
                    Manage Admin Roles
                </h2>
                <p class="text-green-300">
                    Promote or demote administrators.
                </p>
            </a>
            </div>
            @else
            <div class="bg-black border border-green-500 rounded-lg p-6 opacity-50 cursor-not-allowed">
                <h2 class="text-xl font-bold text-green-400 mb-2">
                    Manage Admin Roles
                </h2>
                <p class="text-green-300">
                    Super Admin only.
                </p>
            </div>
            @endif

        </div>

    </div>
</x-layout>
