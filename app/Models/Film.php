<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Film extends Model
{
    use HasFactory;
    use Sluggable;
    
    //memperbolehkan field berikut untuk mass create pada artisan tinker
    //yg boleh diisi hanya field berikut
    // protected $fillable = ['title', 'sinopsis', 'director'];
    // yg tidak boleh diisi hanya field berikut sisanya boleh
    protected $guarded = ['id'];
    protected $with = ['director', 'category'];
    // $query diisi Film::latest()
    // request('search') ->hasil kiriman dari form dengan name search 
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('full_sinopsis', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('sinopsis', 'like', '%' . $filters['search'] . '%');
        // }
        // isset($filters['search']) ? $filters['search'] : false sama dengan $filters['search']) ?? false (ternary php 7)
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('full_sinopsis', 'like', '%' . $search . '%')
                    ->orWhere('sinopsis', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                return $query->where('slug', 'like', '%' . $category . '%');
            });
        });
        $query->when($filters['director'] ?? false, function ($query, $director) {
            return $query->whereHas('director', function ($query) use ($director) {
                return $query->where('director_slug', 'like', '%' . $director . '%');
            });
        });
    }

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
    public function director()
    {
        return $this->BelongsTo(Director::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function getRouteKeyName()
    {
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
