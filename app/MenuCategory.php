<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $table = 'menu_category';
    protected $fillable = ['list_order', 'order', 'name', 'headline', 'description', 'on_white', 'grid', 'image', 'banner'];
    //Delete photo for image uploader when replacing photo
    function deletePhoto($filename) {

        if( File::exists( public_path() . '/uploads/menu_list/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/menu_list/' . $filename);

            return true;
        }

        return false;
    }
    //Delete photo for image uploader when replacing photo
    function deleteBanner($filename) {

        if( File::exists( public_path() . '/uploads/menu_banners/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/menu_banners/' . $filename);

            return true;
        }

        return false;
    }
}
