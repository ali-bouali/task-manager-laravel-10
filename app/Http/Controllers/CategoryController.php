<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories()->withCount('tasks')->latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ]);

        $validated['user_id'] = auth()->id();

        Category::create($validated);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ]);

        $category->update($validated);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
