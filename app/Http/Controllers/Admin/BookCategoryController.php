<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    
    // List all book categories
    public function index() {
        $bookCategories = BookCategory::all();
        return view('admin.book-category.index', compact('bookCategories'));
    }

    // Create book category
    public function create() {
        return view('admin.book-category.create');
    }

    //  Store book category
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:book_categories,name',
            'description' => 'required'
        ]);

        BookCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'featured' => $request->featured
        ]);

        return redirect()->route('admin.book-category.index')->with('success', 'Book category created successfully');
    }

    // Edit book category
    public function edit(BookCategory $bookCategory) {
        return view('admin.book-category.edit', compact('bookCategory'));
    }

    // Update book category
    public function update(Request $request, BookCategory $bookCategory) {
        $request->validate([
            'name' => 'required|unique:book_categories,name,' . $bookCategory->id,
            'description' => 'required'
        ]);

        $bookCategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'featured' => $request->featured
        ]);

        return redirect()->route('admin.book-category.index')->with('success', 'Book category updated successfully');
    }

    // Delete book category

    public function destroy(BookCategory $bookCategory) {
        $bookCategory->delete();
        return redirect()->route('admin.book-category.index')->with('success', 'Book category deleted successfully');
    }
}
