<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Book extends Model
{
    use HasFactory, HasUuids, HasSlug;

    protected $fillable = [
        'book_category_id',
        'title',
        'slug',
        'author',
        'publisher',
        'cover',
        'description',
        'pdf_url',
        'audio_url',
        'user_id',
        'featured'
    ];

    protected $appends = [
        's3_cover_url',
        's3_pdf_url',
        's3_pdf_summary_url',
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category() {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function getS3CoverUrlAttribute() {
        return $this->cover ? Storage::disk('s3')->url($this->cover) : null;
    }

    public function getS3PdfUrlAttribute() {
        return $this->pdf_url ? Storage::disk('s3')->url($this->pdf_url) : null;
    }

    public function getS3PdfSummaryUrlAttribute() {
        return  Storage::disk('s3')->url("{$this->id}/summary.pdf");
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function audios() {
        return $this->hasMany(BookAudio::class);
    }
}
