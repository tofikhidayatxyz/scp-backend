<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Storage;

class BookCategory extends Model
{

    use HasFactory, HasUuids, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'description',
        'featured'
    ];

    protected $appends = [
        'thumbnail_url'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

   

    public function getThumbnailUrlAttribute() {
        if(!$this->thumbnail) return null;
        return Storage::disk('s3')->url($this->thumbnail);
    }

    public function books() {
        return $this->hasMany(Book::class);
    }
    
}
