<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookAudio;
use Illuminate\Http\Request;

class PDFWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $book = Book::find($request->uid);
        if($book) {
            $book->summary = $request->summary;
            $book->status = 'COMPlETED';
            $book->save();
        }

        BookAudio::where('book_id', $request->uid)->delete();

        for($i = 1; $i <= $request->maxAudio; $i++) {
            BookAudio::create([
                'book_id' => $book->id,
                'audio_id' => $i,
                'format' => $request->format,
            ]);
        }
        

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
}
