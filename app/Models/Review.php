<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'destinasi_id',
        'user_id',
        'rating',
        'komentar',
    ];

    // review milik destinasi
    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }

    // review milik user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}