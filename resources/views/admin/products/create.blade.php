@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Add Product</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-background p-6 rounded shadow max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium text-primary-lighter mb-1">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required min="0"
                step="0.01">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium text-primary-lighter mb-1">Category</label>
            <select name="category_id" id="category_id"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="community_id" class="block font-medium text-primary-lighter mb-1">Community</label>
            <select name="community_id" id="community_id"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required>
                <option value="">Select Community</option>
                @foreach ($communities as $community)
                    <option value="{{ $community->id }}" {{ old('community_id') == $community->id ? 'selected' : '' }}>
                        {{ $community->name }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- <div class="mb-4">
            <label for="stock" class="block font-medium text-primary-lighter mb-1">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" required min="0">
        </div> --}}
        <div class="mb-4">
            <label for="images" class="block font-medium text-primary-lighter mb-1">Images</label>
            <input type="file" name="images[]" id="images" multiple
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" accept="image/*" required>
            <small class="text-gray-400">JPEG, PNG, JPG, GIF. Max size: 2MB each.</small>
            <div id="image-preview" class="flex flex-wrap gap-2 mt-2"></div>
        </div>
        <script>
            document.getElementById('images').addEventListener('change', function(event) {
                const preview = document.getElementById('image-preview');
                preview.innerHTML = '';
                Array.from(event.target.files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'h-20 w-20 object-cover rounded border';
                            preview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Add Product</button>
        <a href="{{ route('admin.products.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
