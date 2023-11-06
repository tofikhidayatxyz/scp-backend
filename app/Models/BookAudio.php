<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BookAudio extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'audio_id',
        'type',
        'format'
    ];

    protected $appends = [
        'audio_url'
    ];

    public function getAudioUrlAttribute() {
        return Storage::disk('s3')->url($this->book_id . '/audios/' . $this->audio_id . '.' . $this->format);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
