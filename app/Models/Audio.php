<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $table="audios";
    protected $fillable = ["audio_path","titre","lien_video"];
    public function formations(){
        return $this->belongsTo(Formation::class,'formation_audio')
                    ->withPivot('ordre')
                    ->withTimestamps()
        ;
    }
}
