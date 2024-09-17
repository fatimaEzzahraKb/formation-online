<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nom',
        'description',
    ];
    use HasFactory;
    public function souscategory(){
        return $this->hasMany(Category::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
