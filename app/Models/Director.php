<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function film()
    {
        return $this->hasMany(Film::class);
    }
}
