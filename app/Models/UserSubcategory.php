<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubcategory extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","souscategory_id"];
    public function souscategory(){
        return $this->belongsTo(Souscategory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
