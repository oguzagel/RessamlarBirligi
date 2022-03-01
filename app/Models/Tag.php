<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag_id','taggable_type','taggable_id'];
    public function artists(){
        return $this->morphedByMany(Artist::class,'taggable');    
    }

    

}
