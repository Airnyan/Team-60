<x-layout>
<x-slot:title>Edit User</x-slot:title>

<div class="p-6 max-w-xl mx-auto">

<div class="bg-black border border-green-500 p-6 rounded-lg shadow-xl">

<h2 class="text-xl font-bold text-green-400 mb-4">Edit User Details</h2>

@if(session('success'))
<div class="bg-green-900 border border-green-500 p-2 rounded text-green-300 mb-4">
    {{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('admin.users.update', $user) }}">
@csrf
@method('PUT')

<div class="mb-4">
    <label class="text-green-300">Name</label>
    <input type="text" name="name" value="{{ $user->name }}"
        class="w-full bg-gray-900 border border-green-700 text-green-200 p-2 rounded">
</div>

<div class="mb-4">
    <label class="text-green-300">Email</label>
    <input type="email" name="email" value="{{ $user->email }}"
        class="w-full bg-gray-900 border border-green-700 text-green-200 p-2 rounded">
</div>

<div class="mb-4">
    <label class="text-green-300">Phone</label>
    <input type="text" name="phone" value="{{ $user->phone }}"
        class="w-full bg-gray-900 border border-green-700 text-green-200 p-2 rounded">
</div>

<button class="w-full bg-green-600 hover:bg-green-400 text-black font-bold py-2 rounded transition">
    Save Changes
</button>

</form>

<hr class="border-green-700 my-6">

<form method="POST" action="{{ route('admin.users.reset', $user) }}">
@csrf

<button class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-2 rounded transition">
    Send Password Reset Link
</button>

</form>

</div>
</div>

</x-layout>



