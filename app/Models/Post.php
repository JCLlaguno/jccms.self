<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = ['image', 'title', 'body'];

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function getImageAttribute($image) {

        if($image == null) :

            return 'http://lorempixel.com/g/400/200';

        elseif(strpos($image, 'lorempixel') == TRUE) :
           
            return $image;

        endif;

        return '/images/' . $image;

    }

}
