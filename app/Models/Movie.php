<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
