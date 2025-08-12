
@extends('layouts.admin')
@section('content')
    <div x-data="productModals()" class="mb-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-lighter">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">+
            Add Users</a>
    </div>

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="bg-dark-light rounded-lg p-6 border border-primary/20 jewelry-glow">
    <div class="relative w-full overflow-auto">
        <table id="users-table" class="w-full caption-bottom text-sm divide-y divide-primary/10 display">
            <thead class="[&_tr]:border-b">
                <tr class="border-primary/30">
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter w-[100px]">No</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Name</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Email</th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-primary-lighter">Role</th>
                    <th class="h-12 px-4 text-right align-middle font-medium text-primary-lighter">Actions</th>
                </tr>
            </thead>
            <tbody class="[&_tr:last-child]:border-0">
                @forelse ($users as $user)
                    <tr class="border-primary/10 hover:bg-primary/10">
                        <td class="p-4 align-middle">{{ $loop->iteration }}</td>
                        <td class="p-4 align-middle font-medium text-gray-200">{{ $user->name }}</td>
                        <td class="p-4 align-middle text-gray-300">{{ $user->email }}</td>
                        <td class="p-4 align-middle text-gray-300">{{ $user->role }}</td>
                        <td class="p-4 align-middle text-right">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-primary-lighter hover:bg-primary/20">
                                <i class="fas fa-edit h-4 w-4"></i>
                                <span class="sr-only">Edit</span>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                class="inline delete-user-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 text-red-500 hover:bg-red-500/20 delete-btn">
                                    <i class="fas fa-trash-alt h-4 w-4"></i>
                                    <span class="sr-only">Delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-400">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action will permanently delete the product.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endpush