<x-layout>
    <x-slot:title>
        Admin – Create Admin
    </x-slot:title>

    <div class="container mx-auto py-10 text-white">

        <h1 class="text-3xl font-bold mb-6 text-green-400">
            Admin – Create New Admin Account
        </h1>

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-6 p-4 border border-green-500 bg-black text-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errors --}}
        @if($errors->any())
            <div class="mb-6 p-4 border border-red-500 bg-black text-red-400 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-lg bg-black border border-green-500 rounded-lg p-8">

            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block mb-2 text-green-400 font-semibold">
                        Admin Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        class="w-full px-4 py-2 rounded bg-black border border-green-500
                               text-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-2 text-green-400 font-semibold">
                        Admin Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        class="w-full px-4 py-2 rounded bg-black border border-green-500
                               text-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- Password -->
                <div>
                    <label class="block mb-2 text-green-400 font-semibold">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        class="w-full px-4 py-2 rounded bg-black border border-green-500
                               text-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block mb-2 text-green-400 font-semibold">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full px-4 py-2 rounded bg-black border border-green-500
                               text-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-600 text-black
                           font-bold px-6 py-3 rounded transition duration-200"
                >
                    Create Admin Account
                </button>
            </form>

        </div>

    </div>
</x-layout>
