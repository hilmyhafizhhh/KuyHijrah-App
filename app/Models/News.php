<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%'. $search .'%')->orWhere('body', 'like', '%' . $search .'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
               $query->where('slug', $category); 
            });
        });
        $query->when($filters['source'] ?? false, fn($query, $source) => $query->whereHas('source', fn($query) => $query->where('slug', $source))
        );
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function source() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
