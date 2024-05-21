<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $table = 'lend';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'book_id',
        'lend_date',
        'return_date',
        'status',
        'updated_at',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function fine()
    {
        return $this->hasMany(Fine::class);
    }
}
