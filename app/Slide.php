<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Slide extends Model
{
    protected $table = 'slides';
    protected $fillable = ['image', 'heading_small', 'heading_large', 'heading_sub', 'right_align', 'on_white', 'order', 'archive', 'draft', 'no_headline', 'link'];
    public static $rules = [
       'image' =>  'required'
    ];

    //Delete photo for image uploader when replacing photo
    function deletePhoto($filename) {

        if( File::exists( public_path() . '/uploads/slideshow/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/slideshow/' . $filename);

            return true;
        }

        return false;
    }
}
