<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationAudio extends Model
{
    use HasFactory;
    protected $table ="formation_audios";
    protected $fillable = ["audio_id","formation_id","ordre"];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function audios(){
        return $this->belongsTo(Audio::class);
    }
}
