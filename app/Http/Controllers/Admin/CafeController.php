<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CafeController extends Controller
{
    //
    /**
     * PagesController constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.cafe.index');
    }
}
