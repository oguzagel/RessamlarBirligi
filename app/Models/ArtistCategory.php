<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistCategory extends Model
{
    use HasFactory;

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
