@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Add Community</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.communities.store') }}" method="POST" enctype="multipart/form-data" class="bg-background p-6 rounded shadow max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Community Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block font-medium text-primary-lighter mb-1">Image</label>
            <input type="file" name="image" id="image"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" accept="image/*">
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Add Community</button>
        <a href="{{ route('admin.communities.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
