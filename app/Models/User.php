<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'role',
        'picture',
        'created_at',
        'updated_at'
    ];

    public function lends(): HasMany
    {
        return $this->hasMany(Lend::class);
    }

    public function Fine(): HasMany
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
    
    // use HasApiTokens, HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
