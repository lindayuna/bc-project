<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'category',
        'status',
        'source',
        'views',
        'user_id' // TAMBAHKAN INI - YANG HILANG!
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($content) {
            // Auto generate slug jika kosong
            if (empty($content->slug) && !empty($content->title)) {
                $content->slug = static::generateUniqueSlug($content->title);
            }
            
            if (empty($content->user_id) && Auth::check()) {
                $content->user_id = Auth::id();
            }
        });
        
        static::updating(function ($content) {
            if ($content->isDirty('title') && (empty($content->slug) || $content->getOriginal('title') !== $content->title)) {
                $content->slug = static::generateUniqueSlug($content->title, $content->id);
            }
        });
    }

    public static function generateUniqueSlug($title, $id = null)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)->when($id, function($query) use ($id) {
            return $query->where('id', '!=', $id);
        })->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('body', 'like', "%{$term}%")
              ->orWhere('source', 'like', "%{$term}%");
        });
    }

    // Accessors
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->body));
        return ceil($wordCount / 200);
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getIsNewAttribute()
    {
        return $this->created_at->diffInDays() < 7;
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}