<?php

namespace App\Http\Controllers\Admin;

use App\Cafe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CafeController extends Controller
{
    //
    /**
     * @var Cafe
     */
    private $cafe;

    /**
     * PagesController constructor.
     * @param Cafe $cafe
     */
    public function __construct(Cafe $cafe)
    {
        $this->cafe = $cafe;
    }

    public function index()
    {
        $cafes = $this->cafe->where('archive', 0)->orderby('name', 'asc')->get();
        return view('admin.cafe.index', compact('cafes'));
    }

    public function archived()
    {
        $cafes = $this->cafe->where('archive', 1)->orderby('name', 'asc')->get();
        return view('admin.cafe.index', compact('cafes'));
    }

    public function edit($id)
    {
        $cafe = $this->cafe->find($id);
        $days = dayList();
        return view('admin.cafe.edit', compact('cafe', 'days'));
    }

    public function update(Request $request, $id)
    {
        $cafe = $this->cafe->find($id);
        $cafe->update($request->all());
        list($lat, $long) = $this->geolocate($cafe->address, $cafe->city, $cafe->state, $cafe->zip_code, $cafe->country);
        $cafe->lat = $lat;
        $cafe->lng = $long;
        $cafe->maps_url = 'http://maps.google.com/?ll='.$lat.','.$long;
        if ($request->hasFile('image')) {
            // check if previous photo exists and delete it.
            $cafe->deletePhoto($cafe->image);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['image'];
            $extension = $image->getClientOriginalExtension();
            // open image file
            $photo = Image::make($image->getRealPath());
            $photo->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->crop(200, 150);
            // final file name
            $filename = $filename . '.' . $extension;
            // save file with medium quality
            $photo->save(public_path() . '/uploads/store_images/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $cafe->image = $filename;
        }
        $cafe->save();
        $this->updatePhoneNumber($cafe, $request);
        return back()->with('success', 'Cafe Updated!');
    }

    public function geolocate($address, $city, $state, $zip, $country)
    {
        $address = urlencode($address.' '.$city.', '.$state.' '.$zip.', '.$country);
        $url = "http://maps.google.com/maps/api/geocode/json?address=" . $address . "&sensor=false";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        $lat = $response_a->results[0]->geometry->location->lat;
        $long = $response_a->results[0]->geometry->location->lng;
        return array($lat, $long);
    }

    public function create()
    {
        $days = dayList();
        return view('admin.cafe.create', compact('days'));
    }

    public function store(Request $request)
    {
        $cafe = $this->cafe->create($request->all());
        list($lat, $long) = $this->geolocate($cafe->address, $cafe->city, $cafe->state, $cafe->zip_code, $cafe->country);
        $cafe->lat = $lat;
        $cafe->lng = $long;
        $cafe->maps_url = 'http://maps.google.com/?ll='.$lat.','.$long;
        if ($request->hasFile('image')) {
            // check if previous photo exists and delete it.
            $cafe->deletePhoto($cafe->image);

            // generate a random file name
            $filename = Str::random(10) . time();
            // assinged file input to a variable
            $image = $request['image'];
            $extension = $image->getClientOriginalExtension();
            // open image file
            $photo = Image::make($image->getRealPath());
            $photo->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->crop(200, 150);
            // final file name
            $filename = $filename . '.' . $extension;
            // save file with medium quality
            $photo->save(public_path() . '/uploads/store_images/' . $filename, 100);
            // get original image file extension
            // store file name in database
            $cafe->image = $filename;
        }
        $this->nullHoursOnClosed($cafe, $request);
        $cafe->save();
        return redirect('admin/cafes/'.$cafe->id.'/edit')->with('success', 'Cafe Created!');
    }

    public function updateServices(Request $request, $id)
    {
        $cafe = $this->cafe->find($id);
        $cafe->update($request->all());
        return back()->with('Cafe Services Updated!');
    }

    public function updateHours(Request $request, $id)
    {
        $cafe = $this->cafe->find($id);
        $cafe->update($request->all());
        $this->nullHoursOnClosed($cafe);
        $cafe->save();
        return back()->with('Cafe Hours Updated!');
    }

    public function archive($id) {
        $cafe = $this->cafe->find($id);
        if($cafe->archive == 0) {
            $cafe->archive = 1;
            $message = 'Cafe Archived!';
        } else {
            $cafe->archive = 0;
            $message = 'Cafe Is Active!';
        }
        $cafe->save();
        return back()->with('success', $message);
    }

    /**
     * @param $cafe
     */
    public function nullHoursOnClosed($cafe)
    {
        if ($cafe['monday_open'] == 0) {
            $cafe->monday_start = null;
            $cafe->monday_end = null;
        }
        if ($cafe['tuesday_open'] == 0) {
            $cafe->tuesday_start = null;
            $cafe->tuesday_end = null;
        }
        if ($cafe['wednesday_open'] == 0) {
            $cafe->wednesday_start = null;
            $cafe->wednesday_end = null;
        }
        if ($cafe['thursday_open'] == 0) {
            $cafe->thursday_start = null;
            $cafe->thursday_end = null;
        }
        if ($cafe['friday_open'] == 0) {
            $cafe->friday_start = null;
            $cafe->friday_end = null;
        }
        if ($cafe['saturday_open'] == 0) {
            $cafe->saturday_start = null;
            $cafe->saturday_end = null;
        }
        if ($cafe['sunday_open'] == 0) {
            $cafe->sunday_start = null;
            $cafe->sunday_end = null;
        }
    }

    public function updatePhoneNumber($cafe, $request)
    {
        if($cafe->phone) {
            $origPhone = $cafe->phone;
            $phone = preg_replace( '/[^+.,0-9]/', '', $origPhone );
            $phone = str_replace('+', '', $phone);
            $phone = str_replace('.', '', $phone);
            $phone = str_replace(',', '', $phone);
            if (($cafe->country == "USA") || ($request['country'] == "USA")) {
                if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $phone,  $matches ) )
                {
                    $result = '('.$matches[1] . ') ' .$matches[2] . '-' . $matches[3];
                    $phone = $result;
                }
            }
            $cafe->phone = $phone;
        }
        $cafe->save();
    }
}
