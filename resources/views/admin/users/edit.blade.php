@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Edit User</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-background p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium text-primary-lighter mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>
        <div class="mb-4">
            <label for="role" class="block font-medium text-primary-lighter mb-1">Role</label>
            <select name="role" id="role"
            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required>
            <option value="" disabled>Select role</option>
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium text-primary-lighter mb-1">Password <span class="text-xs text-gray-500">(leave blank to keep current)</span></label>
            <input type="password" name="password" id="password"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-medium text-primary-lighter mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Update User</button>
        <a href="{{ route('admin.users.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
