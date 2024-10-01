@extends('admin.layouts.app')

@section('title', 'Plans')

@section('content')
<div class="container-fluid">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Plans</h2>

            <div class="mb-4">
                <button onclick="toggleCreateForm()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Add New Plan
                </button>
            </div>

            <!-- Create Plan Form -->
<div id="createPlanForm" class="mb-8 hidden">
    <h3 class="text-xl font-semibold mb-4">Create New Plan</h3>
    <form action="{{ route('admin.plans.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price" step="0.01" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div>
            <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="is_active" id="is_active" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
    </div>

    <div>
        <label for="features" class="block text-sm font-medium text-gray-700">Features</label>
        <textarea name="features" id="features" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
    </div>

    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Plan
        </button>
    </div>
</form>

</div>

            <!-- Plans Table -->
            <table class="min-w-full leading-normal">
    <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Name
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Price
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Description
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Status
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
    @forelse($plans as $plan)
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">{{ $plan->name }}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">₹{{ $plan->price }}</p>
</td>

            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">{{ Str::limit($plan->description, 50) }}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                    <span aria-hidden class="absolute inset-0 {{ $plan->is_active ? 'bg-green-200' : 'bg-red-200' }} opacity-50 rounded-full"></span>
                    <span class="relative">{{ $plan->is_active ? 'Active' : 'Inactive' }}</span>
                </span>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('admin.plans.edit', $plan->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this plan?')">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                No plans found.
            </td>
        </tr>
    @endforelse
</tbody>

</table>
        </div>
    </div>
</div>

<script>
function toggleCreateForm() {
    const form = document.getElementById('createPlanForm');
    form.classList.toggle('hidden');
}
</script>
@endsection
