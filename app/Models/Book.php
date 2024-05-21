<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title',
        'author',
        'editor',
        'publisher',
        'year',
        'category',
        'language',
        'translator',
        'page',
        'volume',
        'synopsis',
        'type',
        'status',
        'cover',
        'created_at',
        'updated_at'
    ];

    public function Lend()
    {
        return $this->hasMany(Lend::class);
    }

    public function Fine()
    {
        return $this->hasMany(Fine::class);
    }

    public function Favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function Rate()
    {
        return $this->hasMany(Rate::class);
    }
}
