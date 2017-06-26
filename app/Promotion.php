<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class Promotion extends Model
{
    protected $table = 'promotion';

    //Delete photo for image uploader when replacing photo
    function deleteFile($filename) {

        if( File::exists( public_path() . '/uploads/promotion/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/promotion/' . $filename);

            return true;
        }

        return false;
    }
    public function file()
    {
        return URL::asset('uploads/promotion/'.$this->file);
    }

    public function scopehasFile($query)
    {
        return $query->whereNotNull('created_at');
    }
}
