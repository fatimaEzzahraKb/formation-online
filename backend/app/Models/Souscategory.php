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
        'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function userList()
    {
        return $this->belongsToMany(User::class, 'user_subcategories', 'souscategory_id', 'user_id')->withPivot('id');
    }

    public function formations(){       
        return $this->hasMany(Formation::class);
    }

}
