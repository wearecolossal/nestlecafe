<?php

namespace App\Http\Controllers;

use App\Cafe;
use App\HomePage;
use App\MenuCategory;
use App\MenuItem;
use App\Slide;
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
     * @var Slide
     */
    private $slide;
    /**
     * @var HomePage
     */
    private $homePage;

    /**
     * PagesController constructor.
     * @param MenuCategory $menuCategory
     * @param MenuItem $menuItem
     * @param Cafe $cafe
     * @param Slide $slide
     * @param HomePage $homePage
     */
    public function __construct(MenuCategory $menuCategory, MenuItem $menuItem, Cafe $cafe, Slide $slide, HomePage $homePage)
    {
        $this->menuCategory = $menuCategory;
        $this->menuItem = $menuItem;
        $this->cafe = $cafe;
        $this->slide = $slide;
        $this->homePage = $homePage;
    }

    /*
     * HOMEPAGE
     */
    public function index()
    {
        $callout = $this->homePage->find(1);
        $slides = $this->slide->where('archive', 0)->where('draft', 0)->orderby('order', 'asc')->get();
        return view('pages.home', compact('slides', 'callout'));
    }

    /*
     * MENU
     */
    public function menu() {
        $metaTitle = 'Menu';
        $categories = $this->menuCategory->where('list_order', '!=', 0)->orderby('list_order', 'asc')->get();
        return view('pages.menu', compact('categories', 'metaTitle'));
    }
    
    /*
     * CAFE LOCATOR
     */
    public function locator() {
        $metaTitle = 'Café Locations';
        return view('pages.locator', compact('metaTitle'));
    }
    
    /*
     * OUR STORY
     */
    public function story() {
        $metaTitle = 'Our Story';
        return view('pages.story', compact('metaTitle'));
    }

    /*
     * FRANCHISE
     */
    public function franchise() {
        $metaTitle = 'Franchising Opportunities';
        return view('pages.franchise', compact('metaTitle'));
    }

    /*
     * FRANCHISE
     */
    public function order() {
        $metaTitle = 'Order Online';
        return view('pages.order', compact('metaTitle'));
    }

    /*
     * ABOUT US
     */
    public function about() {
        $metaTitle = 'About Us';
        return view('pages.about-us', compact('metaTitle'));
    }

    /*
     * CONTACT US
     */
    public function contact() {
        $metaTitle = 'Contact Us';
        return view('pages.contact', compact('metaTitle'));
    }

    /*
     * CONTACT US
     */
    public function careers() {
        $metaTitle = 'Careers';
        return view('pages.careers', compact('metaTitle'));
    }

    /*
     * LEGAL
     */
    public function legal() {
        $metaTitle = 'Legal & Privacy';
        return view('pages.legal', compact('metaTitle'));
    }

    /*
     * CAFE CLUB
     */
    public function cafeClub() {
        $metaTitle = 'Café Club';
        return view('pages.cafe-club', compact('metaTitle'));
    }
}
