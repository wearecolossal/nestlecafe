<?php

namespace App\Http\Controllers\Admin;

use App\MenuCategory;
use App\MenuItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    //
    /**
     * @var MenuItem
     */
    private $menuItem;
    /**
     * @var MenuCategory
     */
    private $menuCategory;

    /**
     * PagesController constructor.
     * @param MenuItem $menuItem
     * @param MenuCategory $menuCategory
     */
    public function __construct(MenuItem $menuItem, MenuCategory $menuCategory)
    {
        $this->menuItem = $menuItem;
        $this->menuCategory = $menuCategory;
    }

    public function index()
    {
        $categories = $this->menuCategory->orderby('order', 'asc')->get();
        $items = $this->menuItem->orderby('name', 'asc')->get();
        return view('admin.menu.index', compact('items', 'categories'));
    }

    public function edit($id)
    {
        $categories = $this->menuCategory->orderby('name', 'asc')->get();
        $item = $this->menuItem->find($id);
        return view('admin.menu.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $item = $this->menuItem->find($id);
        $item->name = $request['name'];
        $item->on_white = $request['on_white'];
        $item->order = $request['order'];
        $item->description = $request['description'];
        if ($request->hasFile('image')) {
            // check if previous photo exists and delete it.
            $item->deletePhoto($item->image);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['image'];
            $extension = $image->getClientOriginalExtension();
            // open image file
            $photo = Image::make($image->getRealPath());
            $photo->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->crop(700, 525);
            // final file name
            $filename = $filename . '.' . $extension;
            // save file with medium quality
            $photo->save(public_path() . '/uploads/menu_items/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $item->image = $filename;
        }
        $item->save();
        return back()->with('success', 'this is test');
    }

}