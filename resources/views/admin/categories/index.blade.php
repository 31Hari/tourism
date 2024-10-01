@extends('admin.layouts.app')

@section('title', 'Category Plans')

@section('content')
<div class="container-fluid">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold">Category Plans</h2>

            <!-- Category Plans table -->
            <table class="min-w-full leading-normal mb-8">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Plan
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Category
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($category_plans as $category_plan)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $category_plan->plan->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $category_plan->category->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <form action="{{ route('category_plan.destroy', $category_plan) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to remove this category from the plan?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                No category plans found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Form to assign category to plan -->
            <h2 class="text-2xl font-semibold mt-12 mb-6">Assign Category to Plan</h2>
            <form action="{{ route('category_plan.store') }}" method="POST" class="mb-8">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="plan_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Select Plan:
                        </label>
                        <select name="plan_id" id="plan_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            <option value="">Choose a plan</option>
                            @foreach($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="category_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Select Category:
                        </label>
                        <select name="category_id" id="category_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            <option value="">Choose a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Assign Category to Plan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
