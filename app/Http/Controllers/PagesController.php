<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use App\MenuItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
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
     * PagesController constructor.
     * @param MenuCategory $menuCategory
     * @param MenuItem $menuItem
     */
    public function __construct(MenuCategory $menuCategory, MenuItem $menuItem)
    {
        $this->menuCategory = $menuCategory;
        $this->menuItem = $menuItem;
    }

    /*
     * HOMEPAGE
     */
    public function index()
    {
        return view('pages.home');
    }

    /*
     * MENU
     */
    public function menu() {
        $categories = $this->menuCategory->where('list_order', '!=', 0)->orderby('list_order', 'asc')->get();
        return view('pages.menu', compact('categories'));
    }
    
    /*
     * CAFE LOCATOR
     */
    public function locator() {
        return view('pages.locator');
    }
    
    /*
     * OUR STORY
     */
    public function story() {
        return view('pages.story');
    }
}
