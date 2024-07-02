<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'description',
        'cover_path',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user');
    }
}
