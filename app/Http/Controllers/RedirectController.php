<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RedirectController extends Controller
{
    public function index($page, $sub = null, $tert = null)
    {
        switch ($page) {
            case 'ordering':
                return redirect('online-order');
                break;
            case 'locations':
                switch ($sub) {
                    default:
                        return redirect('locations');
                        break;
                }
                break;
            case 'news':
                return redirect('blog');
                break;
            default:
                return abort(404);
        }
    }
}
