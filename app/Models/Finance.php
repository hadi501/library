<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table = 'finance';
    protected $primaryKey = 'id';
    protected $fillable = [
        'activity',
        'amount',
        'type',
        'note',
        'updated_at',
        'created_at'
    ];
}
