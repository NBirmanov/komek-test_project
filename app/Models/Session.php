<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'movie_sessions';

    protected $fillable = ['date', 'time', 'price', 'format', 'hall', 'movie_id', 'user_id'];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
