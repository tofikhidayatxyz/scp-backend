<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    /**
     * listing all books with paginate
     * @param search
     */
    public function index(Request $request) {
        $search = $request->search;
        $category = $request->category;
        $books = Book::with('category')->when($search, function($q) use($search) {
            $q->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('author', 'LIKE', '%' . $search . '%')
                ->orWhere('publisher', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%');
        })->when($category, function($q) use($category) {
            $q->whereHas('category', function($q) use($category) {
                $q->where('slug', $category);
            });
        })->paginate(10);
        return view('admin.book.index', compact('books'));
    }
    /**
     * Create new book
     */
    public function create() {
        $categories = BookCategory::all();
        return view('admin.book.create')->with('categories', $categories);
    }
    /**
     * Store new book
     */
    public function store(Request $request) {
        $request->validate([
            'book_category_id' => 'required',
            'title' => 'required|unique:books,title',
            'author' => 'required',
            'publisher' => 'required',
            'featured' => 'required',
            'cover' => 'required|file|mimes:jpg,jpeg,png|max:100000',
            'file' => 'required|file|mimes:pdf|max:100000'
        ]);

       $book = Book::create([
            'book_category_id' => $request->book_category_id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'featured' => $request->featured,
        ]);

        
        $pdfPath = '/'.$book->id.'/'.'book.pdf';
        $pdfFile = $request->file('file');
        
        Storage::disk('s3')->put($pdfPath, file_get_contents($pdfFile), 'public');

        $coverFile = $request->file('cover');
        $coverPath = '/'.$book->id.'/'.'cover.'.$coverFile->getClientOriginalExtension();
        Storage::disk('s3')->put($coverPath, file_get_contents($coverFile), 'public');
        
        $book->cover = $coverPath;
        $book->pdf_url = $pdfPath;

        $book->save();

        Http::post(env('WORKER_URL'), [
            "uuid" => $book->id,
            "lang" => "en",
            "title" => $book->title,
            "description" => $book->description,
            "author" => $book->author,
            "publisher" => $book->publisher,
            "slow" => true
        ]);

        return redirect()->route('admin.book.index')->with('success', 'Book created successfully');
    }

    /**
     * Edit book
     */
    public function edit(Book $book) {

        $categories = BookCategory::all();
        return view('admin.book.edit', compact('book', 'categories'));
    }

    /**
     * Update book
     */
    public function update(Request $request, Book $book) {
        $request->validate([
            'book_category_id' => 'required',
            'title' => 'required|unique:books,title,' . $book->id,
            'author' => 'required',
            'publisher' => 'required',
            'featured' => 'required',
            'cover' => 'nullable|file|mimes:jpg,jpeg,png|max:100000',
            'file' => 'nullable|file|mimes:pdf|max:100000'
        ]);

        $book->update([
            'book_category_id' => $request->book_category_id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'featured' => $request->featured,
        ]);

       
        $majorChange = false;
        if($request->hasFile('file')) {

            $majorChange = true;
            $pdfPath = '/'.$book->id.'/'.'book.pdf';
            $pdfFile = $request->file('file');
            
            Storage::disk('s3')->put($pdfPath, file_get_contents($pdfFile), 'public');
            $book->pdf_url = $pdfPath;
        }

        if($request->hasFile('cover')) {
            $coverFile = $request->file('cover');
            $coverPath = '/'.$book->id.'/'.'cover.'.$coverFile->getClientOriginalExtension();
            Storage::disk('s3')->put($coverPath, file_get_contents($coverFile), 'public');
            $book->cover = $coverPath;
        }
        

        $book->save();

        Http::post(env('WORKER_URL'), [
            "uuid" => $book->id,
            "lang" => "en",
            "title" => $book->title,
            "slow" => true
        ]);

        return redirect()->route('admin.book.index')->with('success', 'Book updated successfully');
    }

    // Delete book
    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('admin.book.index')->with('success', 'Book deleted successfully');
    }
    
}
