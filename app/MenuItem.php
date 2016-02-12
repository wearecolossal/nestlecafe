<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';
    protected $fillable = ['name', 'order', 'on_white', 'description', 'image', 'category'];
    public static $rules = [
      'name' => 'required',
      'order' => 'required',
      'on_white' => 'required',
      'description' => 'required',
      'category' => 'required'
    ];

    //Delete photo for image uploader when replacing photo
    function deletePhoto($filename) {

        if( File::exists( public_path() . '/uploads/menu_items/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/menu_items/' . $filename);

            return true;
        }

        return false;
    }
}
