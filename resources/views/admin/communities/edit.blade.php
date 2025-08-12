@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Edit Community</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.communities.update', $community->id) }}" method="POST" enctype="multipart/form-data" class="bg-background p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Community Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $community->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">{{ old('description', $community->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block font-medium text-primary-lighter mb-1">Image</label>
            <input type="file" name="image" id="image"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" accept="image/*"
                onchange="previewImage(event)">
            <div class="mt-2">
                <img id="image-preview" src="{{ $community->image ? asset('storage/' . $community->image) : '' }}" alt="Current Image" class="h-24 rounded" @if(!$community->image) style="display:none;" @endif>
            </div>
        </div>
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('image-preview');
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            }
        </script>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Update Community</button>
        <a href="{{ route('admin.communities.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
