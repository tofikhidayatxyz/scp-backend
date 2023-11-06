<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookAudio;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $category = $request->input('category');


        $books = Book::select([
            'books.id',
            'books.title',
            'books.author',
            'books.slug',
            'books.cover',
            'book_categories.name as category_name',
        ])
            ->with('category')
            ->when($search, function($q) use($search) {
                $q->whereFuzzy('books.title', $search)
                ->orWhereFuzzy('books.author', $search)
                ->orWhereFuzzy('books.description', $search)
                ->orWhereFuzzy('books.publisher', $search)
                ->orWhereFuzzy('books.summary', $search)
                ->orWhere('book_categories.name', $search);
                
        })
        ->join('book_categories', 'book_categories.id', '=', 'books.book_category_id')
        ->when($category, function($q) use($category) {
            $q->whereHas('category', function($q) use($category) {
                $q->where('slug', $category);
            });
        })
        ->get();

        return response()->json([
            'message' => 'OK',
            'code' => 200,
            'data' => $books
        ]);
    }
    public function category(Request $request) {
        $categories = BookCategory::withCount('books')->get();

        return response()->json([
            'message' => 'OK',
            'code' => 200,
            'data' => $categories
        ]);
    }

    public function detail(Request $request, $id) {
        $book = Book::where('slug', $id)->with('category')->firstOrFail();

        $audios = BookAudio::where('book_id', $book->id)->where('type', 'page')->orderBy('audio_id', 'ASC')->get();
        $audioSum = BookAudio::where('book_id', $book->id)->where('type', 'summary')->first();
        $audioDesc = BookAudio::where('book_id', $book->id)->where('type', 'description')->first();
        

        return response()->json([
            'message' => 'OK',
            'code' => 200,
            'data' => [
                'book' => $book,
                'audios' => [
                    'page' => $audios,
                    'summary' => $audioSum,
                    'description' => $audioDesc
                ],
                'pdf' => [
                    'book' => $book->s3_pdf_url,
                    'summary' => $book->s3_pdf_summary_url
                ]
            ]
        ]);
    }
}
