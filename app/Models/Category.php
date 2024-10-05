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
    public function souscategories(){
        return $this->hasMany(Souscategory::class,'category_id','id');
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function formations(){       
        return $this->hasMany(Formation::class);
    }
}
