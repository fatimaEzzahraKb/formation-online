<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'permission',
        'category_id',
        'souscategory_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function souscategoriesList()
    {
        return $this->belongsToMany(Souscategory::class, 'user_subcategories', 'user_id', 'souscategory_id')->withPivot('id');
    }

    public function favoris(){
        return $this->hasOne(Favoris::class);
    }
    public function histories(){
        return $this->hasMany(History::class);
    }
}
