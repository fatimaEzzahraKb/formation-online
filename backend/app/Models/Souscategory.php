<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
    public function formations(){       
        return $this->hasMany(Formation::class);
    }

}
