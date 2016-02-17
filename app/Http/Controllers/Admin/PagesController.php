<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
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
        return view('admin.index');
    }
}
