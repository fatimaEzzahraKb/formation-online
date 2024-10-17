<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    
    protected $fillable = ["video_path","titre"];
    public function formations(){
        return $this->belongsToMany(Formation::class,'formations_video')
                    ->withPivot('order')
                    ->withTimestamps();
    }
}
