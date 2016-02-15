<?php

namespace App\Http\Controllers;

use App\Cafe;
use App\MenuCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class SnippetController extends Controller
{
    //
    /**
     * @var MenuCategory
     */
    private $menuCategory;
    /**
     * @var Cafe
     */
    private $cafe;

    /**
     * SnippetController constructor.
     * @param MenuCategory $menuCategory
     * @param Cafe $cafe
     */
    public function __construct(MenuCategory $menuCategory, Cafe $cafe)
    {
        $this->menuCategory = $menuCategory;
        $this->cafe = $cafe;
    }

    public function outputMenuItems()
    {
        $list = $this->menuCategory->orderby('order', 'asc')->get();
        $menuItems = array();
        foreach($list as $item) {
            array_push($menuItems, [
               'link' => URL::to('menu/'.$item->url),
                'name' => $item->name
            ]);
        }
        return $menuItems;
    }

    public function cleanImageUrl()
    {
        $cafes = $this->cafe->all();
        foreach($cafes as $cafe) {
            if($cafe->image) {
                $image = $cafe->image;
                $cafe->image = str_replace('http://nestlecafe.com/images/uploads/store_images/', '', $image);
                $cafe->save();
            }
        }
        return "images URLS cleaned";
    }

    public function fillServiceColumns()
    {
        $cafes = $this->cafe->all();
        foreach($cafes as $cafe) {
            if(strpos($cafe->legacy_services, 'curbside')) {
                $cafe->curbside = 1;
            }
            if(strpos($cafe->legacy_services, 'icecream')) {
                $cafe->icecream = 1;
            }
            if(strpos($cafe->legacy_services, 'coffee')) {
                $cafe->coffee = 1;
            }
            if(strpos($cafe->legacy_services, 'frozenyogurt')) {
                $cafe->frozenyogurt = 1;
            }
            if(strpos($cafe->legacy_services, 'smoothies')) {
                $cafe->smoothies = 1;
            }
            if(strpos($cafe->legacy_services, 'wifi')) {
                $cafe->wifi = 1;
            }
            if(strpos($cafe->legacy_services, 'cookie')) {
                $cafe->cookie = 1;
            }
            if(strpos($cafe->legacy_services, 'savory')) {
                $cafe->savory = 1;
            }
            if(strpos($cafe->legacy_services, 'bakery')) {
                $cafe->bakery = 1;
            }
            $cafe->save();
        }
        return "cafes' services cleaned";
    }
}
