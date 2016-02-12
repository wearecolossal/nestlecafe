<?php

namespace App\Http\Controllers\Admin;

use App\MenuCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuCategoryController extends Controller
{
    //
    /**
     * @var MenuCategory
     */
    private $menuCategory;

    /**
     * PagesController constructor.
     * @param MenuCategory $menuCategory
     */
    public function __construct(MenuCategory $menuCategory)
    {
        $this->menuCategory = $menuCategory;
    }

    public function edit($id)
    {
        $item = $this->menuCategory->find($id);
        return view('admin.menu.category.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = $this->menuCategory->find($id);
        $item->list_order = $request['list_order'];
        $item->order = $request['order'];
        $item->name = $request['name'];
        $item->headline = $request['headline'];
        $item->description = $request['description'];
        $item->on_white = $request['on_white'];
        $item->grid = $request['grid'];
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
            $photo->resize(627, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->crop(627, 320);
            // final file name
            $filename = $filename . '.' . $extension;
            // save file with medium quality
            $photo->save(public_path() . '/uploads/menu_list/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $item->image = $filename;
        }
        if ($request->hasFile('banner')) {
            // check if previous photo exists and delete it.
            $item->deleteBanner($item->banner);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['image'];
            $extension = $image->getClientOriginalExtension();
            // open image file
            $photo = Image::make($image->getRealPath());
            $photo->resize(1100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->crop(1100, 327);
            // final file name
            $filename = $filename . '.' . $extension;
            // save file with medium quality
            $photo->save(public_path() . '/uploads/menu_banners/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $item->banner = $filename;
        }
        $item->save();
        return back()->with('success', 'Menu Category Updated!');
    }

}
