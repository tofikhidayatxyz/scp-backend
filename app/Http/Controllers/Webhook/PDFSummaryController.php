<?php

namespace App\Http\Controllers\Webhook;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFSummaryController extends Controller
{
    public function __invoke(Request $request)
    {
        $summary = $request->input('summary');
        $uuid    = $request->input('uuid');

        $book = Book::find($uuid);
        $book->summary = $summary;
        $book->save();

        return response()->json([
            'message' => 'Summary updated successfully',
        ]);
    }
}
