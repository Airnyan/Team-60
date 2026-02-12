<x-layout>
    <x-slot:title>
        Admin – Manage Users
    </x-slot:title>

    <div class="container mx-auto py-10 text-white">

        <h1 class="text-3xl font-bold text-green-400 mb-6">
            Manage Users
        </h1>

        <p class="text-green-300 mb-8">
            Super admin panel – manage user roles.
        </p>

        {{-- Success message --}}
        @if(session('success'))
            <div class="mb-6 p-4 border border-green-500 bg-black text-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error messages --}}
        @if($errors->any())
            <div class="mb-6 p-4 border border-red-500 bg-black text-red-400 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="overflow-x-auto bg-black border border-green-500 rounded-lg">
            <table class="min-w-full text-left">

                <thead class="border-b border-green-500">
                    <tr>
                        <th class="px-6 py-3 text-green-400">Name</th>
                        <th class="px-6 py-3 text-green-400">Email</th>
                        <th class="px-6 py-3 text-green-400">Role</th>
                        <th class="px-6 py-3 text-green-400">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b border-green-800 hover:bg-gray-900">

                            <td class="px-6 py-4 text-green-300">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4 text-green-300">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4">
                                @if($user->role === 'super_admin')
                                    <span class="text-purple-400 font-bold">
                                        Super Admin
                                    </span>
                                @elseif($user->role === 'admin')
                                    <span class="text-green-400 font-semibold">
                                        Admin
                                    </span>
                                @else
                                    <span class="text-gray-400">
                                        User
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 space-x-2">

                                {{-- Promote to Admin --}}
                                @if($user->role === 'user')
                                    <form method="POST"
                                          action="{{ route('admin.users.makeAdmin', $user) }}"
                                          class="inline">
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="px-3 py-1 bg-green-500 text-black rounded
                                                   hover:bg-green-600 font-semibold">
                                            Make Admin
                                        </button>
                                    </form>
                                @endif

                                {{-- Demote Admin --}}
                                @if($user->role === 'admin')
                                    <form method="POST"
                                          action="{{ route('admin.users.removeAdmin', $user) }}"
                                          class="inline">
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="px-3 py-1 bg-red-500 text-black rounded
                                                   hover:bg-red-600 font-semibold">
                                            Remove Admin
                                        </button>
                                    </form>
                                @endif

                                {{-- Super admin protection --}}
                                @if($user->role === 'super_admin')
                                    <span class="text-gray-500 italic">
                                        Protected
                                    </span>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</x-layout>
