<?php

namespace App\Http\Controllers\Admin;

use App\HomePage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CalloutController extends Controller
{
    /**
     * @var HomePage
     */
    private $homePage;

    /**
     * CalloutController constructor.
     * @param HomePage $homePage
     */
    public function __construct(HomePage $homePage)
    {
        $this->homePage = $homePage;
    }

    public function index()
    {
        $callout = $this->homePage->find(1);
        return view('admin.homepage_callout.index', compact('callout'));
    }

    public function update(Request $request, $id)
    {
        $callout = $this->homePage->find($id);
        $callout->update($request->all());
        if ($request->hasFile('callout_1')) {
            // check if previous photo exists and delete it.
            $callout->deletePhoto($callout->callout_1);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['callout_1'];
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
            $photo->save(public_path() . '/uploads/homepage_callouts/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $callout->callout_1 = $filename;
        }
        if ($request->hasFile('callout_2')) {
            // check if previous photo exists and delete it.
            $callout->deletePhoto($callout->callout_2);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['callout_2'];
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
            $photo->save(public_path() . '/uploads/homepage_callouts/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $callout->callout_2 = $filename;
        }
        $callout->save();
        return back()->with('success', 'Homepage Callouts Updated!');
    }
}
