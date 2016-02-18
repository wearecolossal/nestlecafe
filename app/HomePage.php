<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class HomePage extends Model
{
    protected $table = 'home_page';
    protected $fillable = ['callout_1', 'callout_1_text', 'callout_1_on_white', 'callout_2', 'callout_2_text', 'callout_2_on_white', 'callout_1_link', 'callout_2_link', 'callout_heading', 'callout_subheading', 'meta_title', 'meta_description'];
    public static $calloutRules = [
        'callout_1' => 'required',
        'callout_2' => 'required',
        'callout_1_text' => 'required',
        'callout_2_text' => 'required',
        'callout_1_link' => 'required',
        'callout_2_link' => 'required',
        'callout_heading' => 'required',
        'callout_subheading' => 'required'
    ];

    //Delete photo for image uploader when replacing photo
    function deletePhoto($filename) {

        if( File::exists( public_path() . '/uploads/homepage_callouts/' . $filename) && !empty($filename) )
        {
            File::delete(public_path() . '/uploads/homepage_callouts/' . $filename);

            return true;
        }

        return false;
    }
}
