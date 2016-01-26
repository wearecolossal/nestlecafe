<?php

namespace App\Http\Controllers;

use App\Cafe;
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
     * @var Cafe
     */
    private $cafe;

    /**
     * PagesController constructor.
     * @param MenuCategory $menuCategory
     * @param MenuItem $menuItem
     * @param Cafe $cafe
     */
    public function __construct(MenuCategory $menuCategory, MenuItem $menuItem, Cafe $cafe)
    {
        $this->menuCategory = $menuCategory;
        $this->menuItem = $menuItem;
        $this->cafe = $cafe;
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

    /*
     * FRANCHISE
     */
    public function franchise() {
        return view('pages.franchise');
    }

    /*
     * FRANCHISE
     */
    public function order() {
        return view('pages.order');
    }

    /*
     * ABOUT US
     */
    public function about() {
        return view('pages.about-us');
    }

    /*
     * CONTACT US
     */
    public function contact() {
        return view('pages.contact');
    }

    /*
     * CONTACT US
     */
    public function careers() {
        return view('pages.careers');
    }

    /*
     * LEGAL
     */
    public function legal() {
        return view('pages.legal');
    }

    /*
     * LEGAL
     */
    public function cafeClub() {
        return view('pages.cafe-club');
    }
}
