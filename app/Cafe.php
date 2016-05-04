<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Cafe extends Model
{
    protected $table = 'store_locations';
    protected $fillable = ['name', 'image', 'store_number', 'address', 'city', 'state', 'country', 'zip_code', 'bakery', 'monday_open', 'monday_start', 'monday_end', 'tuesday_open', 'tuesday_start', 'tuesday_end', 'wednesday_open', 'wednesday_start', 'wednesday_end', 'thursday_open', 'thursday_start', 'thursday_end', 'friday_open', 'friday_start', 'friday_end', 'saturday_open', 'saturday_start', 'saturday_end', 'sunday_open', 'sunday_start', 'sunday_end', 'icecream', 'coffee', 'frozenyogurt', 'smoothies', 'wifi', 'curbside', 'cookie', 'savory', 'maps_url', 'facebook_url', 'online_order', 'archive', 'draft', 'phone', 'coming_soon'];

    //Delete photo for image uploader when replacing photo
    function deletePhoto($filename)
    {

        if (File::exists(public_path() . '/uploads/store_images/' . $filename) && !empty($filename)) {
            File::delete(public_path() . '/uploads/store_images/' . $filename);

            return true;
        }

        return false;
    }
}
