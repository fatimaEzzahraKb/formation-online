<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationVideo extends Model
{
    use HasFactory;
    protected $fillables = ["video_path","formation_id"];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
}
