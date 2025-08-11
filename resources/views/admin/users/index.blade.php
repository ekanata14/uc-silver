@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Users</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Create User Form --}}
        <div class="mb-8 bg-gray-50 p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Add New User</h2>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Name</label>
                    <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" class="w-full border px-3 py-2 rounded" value="{{ old('email') }}"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Role</label>
                    <input type="text" name="role" class="w-full border px-3 py-2 rounded" value="{{ old('role') }}"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Password</label>
                    <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded" required>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create
                    User</button>
            </form>
        </div>

        {{-- Users Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">ID</th>
                        <th class="px-4 py-2 border-b">Name</th>
                        <th class="px-4 py-2 border-b">Email</th>
                        <th class="px-4 py-2 border-b">Role</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->role }}</td>
                            <td class="px-4 py-2 border-b">
                                {{-- Edit User Modal Trigger --}}
                                <button
                                    onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ addslashes($user->role) }}')"
                                    class="text-yellow-600 hover:underline mr-2">Edit</button>
                                {{-- Delete --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Edit User Modal --}}
    <div id="editUserModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Edit User</h2>
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" id="edit_user_id">
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Name</label>
                    <input type="text" name="name" id="edit_name" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" id="edit_email" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Role</label>
                    <input type="text" name="role" id="edit_role" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Password <span class="text-gray-500">(leave blank to keep
                            unchanged)</span></label>
                    <input type="password" name="password" class="w-full border px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded">
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeEditModal()"
                        class="mr-2 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update
                        User</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, email, role) {
            document.getElementById('editUserModal').style.display = 'flex';
            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_role').value = role;
            document.getElementById('editUserForm').action = '/admin/users/' + id;
        }

        function closeEditModal() {
            document.getElementById('editUserModal').style.display = 'none';
        }
    </script>
@endsection
