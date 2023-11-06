<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\BookAudio;
use Illuminate\Http\Request;

class PDFAudioController extends Controller
{
    // PDFAudioController
    public function __invoke(Request $request)
    {
        $audioId = $request->input('audio_id');
        $type    = $request->input('type');
        $uuid    = $request->input('uuid');
        $format  = $request->input('format');

        $audioBook = BookAudio::where('book_id', $uuid)
                                ->where('type', $type)
                                ->where('audio_id', $audioId)
                                ->first();

        if($audioBook) {
            $audioBook->update([
                'audio_id' => $audioId,
                'format' => $format
            ]);
        } else {
            BookAudio::create([
                'book_id' => $uuid,
                'audio_id' => $audioId,
                'type' => $type,
                'format' => $format
            ]);
        }


        return response()->json([
            'message' => 'Audio updated successfully',
        ]);
    }
}
