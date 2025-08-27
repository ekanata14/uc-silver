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

    <form action="{{ route('admin.communities.update', $community->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-background p-6 rounded shadow max-w-lg space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium text-primary-lighter mb-1">Community Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $community->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255"
                placeholder="Enter community name">
        </div>

        <div>
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black"
                placeholder="Describe the community">{{ old('description', $community->description) }}</textarea>
        </div>

        <div>
            <label for="image" class="block font-medium text-primary-lighter mb-1">Image</label>
            <input type="file" name="image" id="image"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" accept="image/*"
                onchange="previewImage(event)">
            <div class="mt-2">
                <img id="image-preview" src="{{ $community->image ? asset('storage/' . $community->image) : '' }}"
                    alt="Current Image" class="h-24 rounded border" @if (!$community->image) style="display:none;" @endif>
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

        <div class="mb-4">
            <label for="account_number" class="block font-medium text-primary-lighter mb-1">Account Number</label>
            <input type="text" name="account_number" id="account_number"
            value="{{ old('account_number', optional($community->bankAccount)->account_number) }}"
            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="50" placeholder="e.g. 1234567890">
        </div>

        <div class="mb-4">
            <label for="account_name" class="block font-medium text-primary-lighter mb-1">Account Name</label>
            <input type="text" name="account_name" id="account_name"
            value="{{ old('account_name', optional($community->bankAccount)->account_name) }}"
            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="100" placeholder="e.g. John Doe">
        </div>

        <div class="mb-4">
            <label for="bank_name" class="block font-medium text-primary-lighter mb-1">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', optional($community->bankAccount)->bank_name) }}"
            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="100" placeholder="e.g. Bank of America">
        </div>

        <div class="mb-4">
            <label for="bank_code" class="block font-medium text-primary-lighter mb-1">Bank Code</label>
            <input type="text" name="bank_code" id="bank_code" value="{{ old('bank_code', optional($community->bankAccount)->bank_code) }}"
            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" maxlength="20" placeholder="e.g. BOFAUS3N">
        </div>

        <div class="flex items-center space-x-4 pt-2">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition">Update Community</button>
            <a href="{{ route('admin.communities.index') }}" class="text-primary-lighter underline">Cancel</a>
        </div>
    </form>
@endsection
