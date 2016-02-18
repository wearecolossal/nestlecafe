<?php

namespace App\Http\Controllers\Admin;

use App\Slide;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    /**
     * @var Slide
     */
    private $slide;

    /**
     * SlideController constructor.
     * @param Slide $slide
     */
    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    public function index()
    {
        $slides = $this->slide->where('archive', 0)->orderby('order', 'asc')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function archived()
    {
        $slides = $this->slide->where('archive', 1)->orderby('order', 'asc')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $input = array_except($request->all(), '_method');
        if($request['draft'] == 0) {
            $validation = Validator::make($input, Slide::$rules);
            if($validation->passes()) {
                $slide = $this->slide->create($input);
                $this->slideFields($request, $slide);
            }
        } else {
            $slide = $this->slide->create($input);
            $this->slideFields($request, $slide);
        }
        return redirect('admin/slides/'.$slide->id.'/edit')->with('success', 'Slide Created!');
    }

    public function edit($id)
    {
        $slide = $this->slide->find($id);
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $input = array_except($request->all(), '_method');
        if($request['draft'] == 0) {
            $validation = Validator::make($input, Slide::$rules);
            if($validation->passes()) {
                $this->updateSlideFields($request, $id, $input);
            }
        } else {
            $this->updateSlideFields($request, $id, $input);
        }
        return back()->with('success', 'Slide Updated!');
    }

    public function archive($id)
    {
        $slide = $this->slide->find($id);
        if($slide->archive == 0) {
            $slide->archive = 1;
            $message = 'Slide Archived!';
        } else {
            $slide->archive = 0;
            $message = 'Slide Is Active!';
        }
        $slide->save();
        return back()->with('success', $message);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $input
     */
    public function updateSlideFields(Request $request, $id, $input)
    {
        $slide = $this->slide->find($id);
        $slide->update($input);
        $this->slideFields($request, $slide);
    }

    /**
     * @param Request $request
     * @param $slide
     */
    public function slideFields(Request $request, $slide)
    {
        if ($request->hasFile('image')) {
            // check if previous photo exists and delete it.
            $slide->deletePhoto($slide->image);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['image'];
            $extension = $image->getClientOriginalExtension();
            // open image file
            $photo = Image::make($image->getRealPath());
            $photo->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->crop(1200, 600);
            // final file name
            $filename = $filename . '.' . $extension;
            // save file with medium quality
            $photo->save(public_path() . '/uploads/slideshow/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $slide->image = $filename;
        }
        if($request['no_headline'] == 1) {
            $slide->headline_small = '';
            $slide->headline_large = '';
            $slide->headline_sub = '';
        }
        $slide->save();
    }
}
