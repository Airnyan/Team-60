<x-layout>
<x-slot:title>Manage Users</x-slot:title>

<div class="p-6 bg-black min-h-screen">

<h1 class="text-green-400 text-2xl font-bold mb-4">Users</h1>

@if(session('success'))
<p class="text-green-300 mb-3">{{ session('success') }}</p>
@endif

<table class="w-full border border-green-600 text-green-300">
<thead class="bg-green-900">
<tr>
<th class="p-2 border border-green-600">Name</th>
<th class="p-2 border border-green-600">Email</th>
<th class="p-2 border border-green-600">Phone</th>
<th class="p-2 border border-green-600">Actions</th>
</tr>
</thead>

<tbody>
@foreach($users as $user)
<tr class="hover:bg-green-950">
<td class="p-2 border border-green-600">{{ $user->name }}</td>
<td class="p-2 border border-green-600">{{ $user->email }}</td>
<td class="p-2 border border-green-600">{{ $user->phone }}</td>

<td class="p-2 border border-green-600">
<a href="{{ route('admin.users.edit', $user) }}" class="bg-green-600 px-3 py-1 text-black rounded">Edit</a>

<!-- DELETE BUTTON (SUPER ADMIN ONLY) -->
                            @if(auth()->user()->role === 'super_admin')
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Are you sure you want to delete this user?')"
                                            class="bg-red-700 hover:bg-red-800 text-white px-3 py-1 rounded text-sm">
                                        Delete
                                    </button>
                                </form>
                            @endif
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</x-layout>
