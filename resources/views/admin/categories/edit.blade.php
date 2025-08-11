@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Edit Category</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-background p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Update Category</button>
        <a href="{{ route('admin.categories.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
