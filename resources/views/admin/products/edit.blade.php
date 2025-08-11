@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Edit Product</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-background p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium text-primary-lighter mb-1">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required min="0"
                step="0.01">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium text-primary-lighter mb-1">Category</label>
            <select name="category_id" id="category_id"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                    <option value="{{ $community->id }}"
                        {{ old('community_id', $product->community_id) == $community->id ? 'selected' : '' }}>
                        {{ $community->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="images" class="block font-medium text-primary-lighter mb-1">Images</label>
            <input type="file" name="images[]" id="images" multiple
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" accept="image/*">
            <small class="text-gray-400">JPEG, PNG, JPG, GIF. Max size: 2MB each.</small>
            <div id="image-preview" class="flex flex-wrap gap-3 mt-3">
                {{-- Existing images --}}
                @if ($product->images)
                    @foreach ($product->images as $img)
                        @php
                            $imagePath = $img->path;
                            $isUrl = filter_var($imagePath, FILTER_VALIDATE_URL);
                        @endphp
                        <div class="relative group inline-block old-image">
                            <img src="{{ $isUrl ? $imagePath : asset('storage/' . $imagePath) }}"
                                class="h-24 w-24 object-cover rounded-lg border border-gray-300 shadow-sm transition-transform duration-200 group-hover:scale-105"
                                alt="Product Image">
                            <a href="{{ route('admin.products.destroy.image', ['id' => $product->id, 'imageId' => $img->id]) }}"
                                class="absolute top-1 right-1 z-10 bg-red-600 text-white rounded-full p-1 w-7 h-7 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 shadow hover:bg-red-700 delete-image-btn"
                                title="Delete Image">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                @endif
                {{-- New images will be appended here --}}
            </div>
            {{-- SweetAlert2 --}}
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.querySelectorAll('.delete-image-btn').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Delete this image?',
                            text: "This action cannot be undone.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                btn.closest('form').submit();
                            }
                        });
                    });
                });

                // Show new images and keep old images
                document.getElementById('images').addEventListener('change', function(event) {
                    const preview = document.getElementById('image-preview');
                    // Remove only new images preview, keep old images
                    Array.from(preview.querySelectorAll('.new-image')).forEach(el => el.remove());
                    Array.from(event.target.files).forEach(file => {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const imgDiv = document.createElement('div');
                                imgDiv.className = 'relative inline-block new-image';
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.className =
                                    'h-24 w-24 object-cover rounded-lg border border-blue-300 shadow-sm';
                                imgDiv.appendChild(img);
                                preview.appendChild(imgDiv);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                });
            </script>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
