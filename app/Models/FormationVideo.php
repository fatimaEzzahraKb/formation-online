<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationVideo extends Model
{
    use HasFactory;
    protected $table ="formation_video";
    protected $fillable = ["video_id","formation_id","order "];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function video(){
        return $this->belongsTo(Video::class);
    }
}
