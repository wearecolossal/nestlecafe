<?php

namespace App\Http\Controllers;

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
     * SnippetController constructor.
     * @param MenuCategory $menuCategory
     */
    public function __construct(MenuCategory $menuCategory)
    {
        $this->menuCategory = $menuCategory;
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
}
