<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PromotionController extends Controller
{
    /**
     * @var Promotion
     */
    private $promotion;

    /**
     * PromotionController constructor.
     * @param Promotion $promotion
     */
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    public function index()
    {
        return view('admin.promotions');
    }

    public function store(Request $request)
    {
        if ($this->promotion->whereNotNull('created_at')->first()) {
            $promotion = $this->promotion->whereNotNull('created_at')->first();
        } else {
            $promotion = new Promotion;
        }
        if ($request->hasFile('file')) {
            $filename = 'Promotion-'.date('Y-m-d-H-i-s');
            $file = $request['file'];
            $extension = $file->getClientOriginalExtension();
            //Storage::disk('promotions')->put($file->getFilename().'.'.$extension,  File::get($file));
            Storage::disk('promotions')->put($filename.'.'.$extension,  File::get($file));
            $promotion->file = $filename.'.'.$extension;
            $promotion->save();
            return back()->with('success', 'File Uploaded!');
        }
    }

    public function destroy(Request $request, $id)
    {
        $promotion = $this->promotion->find($id)->delete();
        return back()->with('success', 'File Deleted!');
    }
}
