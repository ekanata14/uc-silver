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

    <form action="{{ route('admin.communities.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-background p-6 rounded shadow max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium text-primary-lighter mb-1">Community Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="255" placeholder="Enter community name">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-primary-lighter mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" placeholder="Describe the community">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block font-medium text-primary-lighter mb-1">Image</label>
            <input type="file" name="image" id="image"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" accept="image/*">
            <small class="text-gray-500">Upload a representative image (JPG, PNG, max 2MB)</small>
        </div>

        <div class="mb-4">
            <label for="account_number" class="block font-medium text-primary-lighter mb-1">Account Number</label>
            <input type="text" name="account_number" id="account_number"
                value="{{ old('account_number') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="50" placeholder="e.g. 1234567890">
        </div>

        <div class="mb-4">
            <label for="account_name" class="block font-medium text-primary-lighter mb-1">Account Name</label>
            <input type="text" name="account_name" id="account_name"
                value="{{ old('account_name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="100" placeholder="e.g. John Doe">
        </div>

        <div class="mb-4">
            <label for="bank_name" class="block font-medium text-primary-lighter mb-1">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="100" placeholder="e.g. Bank of America">
        </div>

        <div class="mb-4">
            <label for="bank_code" class="block font-medium text-primary-lighter mb-1">Bank Code</label>
            <input type="text" name="bank_code" id="bank_code" value="{{ old('bank_code') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" maxlength="20" placeholder="e.g. BOFAUS3N">
        </div>

        <div class="flex items-center">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Add Community</button>
            <a href="{{ route('admin.communities.index') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
        </div>
    </form>
@endsection
