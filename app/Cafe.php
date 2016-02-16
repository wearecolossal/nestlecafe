<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $table = 'store_locations';
    protected $fillable = ['name', 'image', 'store_number', 'address', 'city', 'state', 'country', 'zip_code', 'bakery', 'icecream', 'coffee', 'frozenyogurt', 'smoothies', 'wifi', 'curbside', 'cookie', 'savory', 'maps_url', 'facebook_url', 'online_order'];
    //Delete photo for image uploader when replacing photo
    function deletePhoto($filename) {

        if( File::exists( public_path() . '/uploads/store_images/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/store_images/' . $filename);

            return true;
        }

        return false;
    }
}
