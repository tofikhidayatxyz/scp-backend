<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request) {
        $category = $request->input('category');
        $banners = Book::where('featured', true)->limit(4)->get(); 
        $featuredBook = Book::where('featured', true)->inRandomOrder()->limit(3)->get();
        $bestBook = Book::where('featured', true)->latest()->first();
        $categories = BookCategory::has('books')->get();


        $popularBook = Book::when($category, function($q) use($category) {
            $q->whereHas('category', function($q) use($category) {
                $q->where('slug', $category);
            });
        })->limit(9)->get();


        // dd($bestBook, $banners);
        return view('public.index')
            ->with('banners', $banners)
            ->with('bestBook', $bestBook)
            ->with('categories', $categories)
            ->with('featuredBook', $featuredBook)
            ->with('popularBook', $popularBook);
    }

    public function book(Request $request) {

        $category = $request->input('category');
        $categories = BookCategory::has('books')->get();
        $books = Book::when($category, function($q) use($category) {
            $q->whereHas('category', function($q) use($category) {
                $q->where('slug', $category);
            });
        })->paginate(18);

        
        return view('public.books.index')
            ->with('categories', $categories)
            ->with('books', $books);
    }

    public function detail($bookId) {

        $book = Book::findOrFail($bookId);
        $audios = $book->audios()->paginate(10)->withQueryString();

        $relatedBooks = Book::where('book_category_id', $book->book_category_id)->where('id', '!=', $book->id)->inRandomOrder()->limit(4)->get();
        return view('public.books.detail')
                ->with('book', $book)
                ->with('relatedBooks', $relatedBooks)
                ->with('audios', $audios);
    }
}
