<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use App\MenuItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * @var MenuCategory
     */
    private $menuCategory;
    /**
     * @var MenuItem
     */
    private $menuItem;

    /**
     * MenuController constructor.
     * @param MenuCategory $menuCategory
     * @param MenuItem $menuItem
     */
    public function __construct(MenuCategory $menuCategory, MenuItem $menuItem)
    {
        $this->menuCategory = $menuCategory;
        $this->menuItem = $menuItem;
    }


    /*
     * SINGLE MENU ITEM
     */
    public function single($url) {
        if(!menu301s($url)) {
            $category = $this->menuCategory->where('url', $url)->first();
            $items = $this->menuItem->where('category', $category->id)->where('archive', 0)->orderby('order', 'asc')->get();
            $metaTitle = 'Menu » '.$category->name;
            return view('pages.menu-single', compact('category', 'items', 'metaTitle'));
        }
        return menu301s($url);
    }
}
