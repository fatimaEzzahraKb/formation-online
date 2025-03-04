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
    'souscategory_id',
    'type'
];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function souscategory(){
        return $this->belongsTo(Souscategory::class);
    }
    public function histories(){
        return $this->hasMany(History::class);
    }
    public function favoris(){
        return $this->belongsToMany(Favoris::class);
    }
    // public function videos(){
    //     return $this->hasMany(FormationVideo::class);
    // }
    // public function audios(){
    //     return $this->hasMany(FormationAudio::class);
    // }
    public function videos(){
        return $this->belongsToMany(Video::class,'formation_video')
                    ->withPivot('order')
                    ->withPivot('id')
                    ->withTimestamps()
        ;
    }
    public function audios(){
        return $this->belongsToMany(Audio::class,'formation_audios')
                    ->withPivot('ordre')
                    ->withPivot('id')
                    ->withTimestamps()
        ;
    }
}
