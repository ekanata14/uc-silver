@extends('layouts.admin')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-lighter">Categories</h1>
        <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark" onclick="openCategoryModal('create')">
            + Add Category
        </button>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600 bg-green-100 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="overflow-x-auto bg-background rounded shadow">
        <table class="min-w-full divide-y divide-primary/10">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2">{{ $category->description }}</td>
                        <td class="px-4 py-2 text-right">
                            <button class="text-blue-500"
                                onclick="openCategoryModal('edit', {{ $category->id }}, '{{ addslashes($category->name) }}', '{{ addslashes($category->description) }}')">Edit</button>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2"
                                    onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Category Modal -->
    <div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded shadow-lg w-full max-w-md p-6 relative">
            <button class="absolute top-2 right-2 text-gray-500" onclick="closeCategoryModal()">&times;</button>
            <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
            <form id="categoryForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Name</label>
                    <input type="text" name="name" id="categoryName" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Description</label>
                    <textarea name="description" id="categoryDescription" class="w-full border px-3 py-2 rounded"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="mr-2 px-4 py-2 rounded bg-gray-200"
                        onclick="closeCategoryModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-primary text-white" id="modalSubmitBtn"></button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCategoryModal(type, id = null, name = '', description = '') {
            document.getElementById('categoryModal').classList.remove('hidden');
            const form = document.getElementById('categoryForm');
            const modalTitle = document.getElementById('modalTitle');
            const submitBtn = document.getElementById('modalSubmitBtn');
            const methodInput = document.getElementById('formMethod');
            form.reset();

            if (type === 'create') {
                modalTitle.textContent = 'Add Category';
                submitBtn.textContent = 'Create';
                form.action = "{{ route('admin.categories.store') }}";
                methodInput.value = 'POST';
                document.getElementById('categoryName').value = '';
                document.getElementById('categoryDescription').value = '';
            } else if (type === 'edit') {
                modalTitle.textContent = 'Edit Category';
                submitBtn.textContent = 'Update';
                form.action = "/categories/" + id;
                methodInput.value = 'PUT';
                document.getElementById('categoryName').value = name;
                document.getElementById('categoryDescription').value = description;
            }
        }

        function closeCategoryModal() {
            document.getElementById('categoryModal').classList.add('hidden');
        }
    </script>
@endsection
