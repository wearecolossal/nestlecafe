<?php

namespace App\Http\Controllers\Admin;

use App\MenuCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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

    public function create()
    {
        return view('admin.menu.category.create');
    }

    public function update(Request $request, $id)
    {
        $item = $this->menuCategory->find($id);
        $item->update($request->all());
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

    public function store(Request $request)
    {
        $input = array_except($request->all(), '_method');
        $validation = Validator::make($input, MenuCategory::$rules);
        if($request['draft'] == 1) {
            $item = $this->createMenuCategory($request, $input);
            return redirect('admin/menu/categories/'.$item->id.'/edit')->with('success', 'New Menu Category Created!');
        } else {
            if($validation->passes()) {
                $item = $this->createMenuCategory($request, $input);
                return redirect('admin/menu/categories/'.$item->id.'/edit')->with('success', 'New Menu Category Created!');
            }
            return back()->with('error', 'Please fill out all required fields');
        }
        return back()->with('error', 'Please fill out all required fields');
    }

    /**
     * @param Request $request
     * @param $input
     * @return static
     */
    public function createMenuCategory(Request $request, $input)
    {
        $item = $this->menuCategory->create($input);
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
        return $item;
    }

    public function archive($id)
    {
        $item = $this->menuCategory->find($id);
        if($item->archive == 0) {
            $item->archive = 1;
            $message = 'Menu Item Archived!';
        } else {
            $item->archive = 0;
            $message = 'Menu Item Is Active!';
        }
        $item->save();
        return back()->with('success', $message);
    }

}
