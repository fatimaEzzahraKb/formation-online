<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationVideo extends Model
{
    use HasFactory;
    protected $fillable = ["video_path","formation_id","ordre","titre"];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function history(){
        return $this->hasMany(History::class);
    }
}
