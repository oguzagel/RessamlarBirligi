<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artist extends Model
{
    use HasFactory;
    
    protected $guarded = [  'id',   'created_at',      'updated_at',  ];


    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }


    public function tags(){
        return $this->morphtoMany(Tag::class,'taggable');
    }



    public function works(){
        return $this->hasMany(Work::class);
    }


    public function categories(){
        return $this->hasMany(ArtistCategory::class);
    }

    public static function boot(){
        parent::boot();
        static::deleting(function($artist){

            //works içindeki resimleri sil
            if ( count($artist->works) > 0 ) {
                foreach ($artist->works as $work) {
                    Storage::delete($work->path);
                }
                
                //works silinecek
                $artist->works()->delete();
            }

            //kategoriler silinecek
            $artist->categories()->delete();
        });


    }


}
