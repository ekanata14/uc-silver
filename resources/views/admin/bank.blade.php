@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-primary-lighter mb-6">Edit Bank Account</h1>

    {{-- Error Handling --}}
    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Edit --}}
    <form action="{{ route('admin.bank.update', $bankAccount->id) }}" method="POST"
        class="bg-background p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="account_number" class="block font-medium text-primary-lighter mb-1">Account Number</label>
            <input type="text" name="account_number" id="account_number"
                value="{{ old('account_number', $bankAccount->account_number) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="50">
        </div>

        <div class="mb-4">
            <label for="account_name" class="block font-medium text-primary-lighter mb-1">Account Name</label>
            <input type="text" name="account_name" id="account_name"
                value="{{ old('account_name', $bankAccount->account_name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="100">
        </div>

        <div class="mb-4">
            <label for="bank_name" class="block font-medium text-primary-lighter mb-1">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name"
                value="{{ old('bank_name', $bankAccount->bank_name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" required maxlength="100">
        </div>

        <div class="mb-4">
            <label for="bank_code" class="block font-medium text-primary-lighter mb-1">Bank Code</label>
            <input type="text" name="bank_code" id="bank_code"
                value="{{ old('bank_code', $bankAccount->bank_code) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring text-black" maxlength="20">
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">
            Update Bank Account
        </button>
        <a href="{{ route('admin.bank') }}" class="ml-4 text-primary-lighter underline">Cancel</a>
    </form>
@endsection
