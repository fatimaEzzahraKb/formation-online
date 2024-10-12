<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationAudio extends Model
{
    use HasFactory;
    protected $fillable = ["audio","formation_id","ordre","titre","lien_video"];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
}
