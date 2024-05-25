<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passtoken extends Model
{
    protected $table = 'pass_token';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'token',
        'updated_at',
        'created_at'
    ];
}
