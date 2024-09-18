<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{   protected $fillable = [
    'titre',
    'description',
    'image_url',
    'video_url',
    'category_id',
    'souscategory_id'
];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function souscategory(){
        return $this->belongsTo(Category::class);
    }
    public function histories(){
        return $this->hasMany(History::class);
    }
    public function videos(){
        return $this->hasMany(FormationVideo::class);
    }
    public function blocked(){
        return $this->hasMany(BlockedFormation::class);
    }
}
