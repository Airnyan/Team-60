<x-layout>
<x-slot:title>Edit User</x-slot:title>
@php
    $address = $user->address->last();
@endphp

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

<div class="mb-4">
    <label class="text-green-300">Address Line 1</label>
    <input type="text" name="address_line_1" value="{{ $address->address_line_1 ?? '' }}"
        class="w-full bg-gray-900 border border-green-700 text-green-200 p-2 rounded">
</div>

<div class="mb-4">
    <label class="text-green-300">Address Line 2</label>
    <input type="text" name="address_line_2" value="{{ $address->address_line_2 ?? '' }}"
        class="w-full bg-gray-900 border border-green-700 text-green-200 p-2 rounded">
</div>

<div class="mb-4">
    <label class="text-green-300">Postcode</label>
    <input type="text" name="postcode" value="{{ $address->postcode ?? '' }}"
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



