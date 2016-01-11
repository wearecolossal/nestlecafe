<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
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
        return view('pages.menu');
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
