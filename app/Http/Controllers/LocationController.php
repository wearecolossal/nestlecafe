<?php

namespace App\Http\Controllers;

use App\Cafe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class LocationController extends Controller
{
    /**
     * @var Cafe
     */
    private $cafe;


    /**
     * LocationController constructor.
     * @param Cafe $cafe
     */
    public function __construct(Cafe $cafe)
    {
        $this->cafe = $cafe;
    }

    /**
     * Output all location in the system as a JSON array
     * @return array
     */
    public function ajax()
    {
        $outputs = $this->cafe->orderby('lat', 'asc')->get();
        $locations = array();
        foreach ($outputs as $output) {
            if (strlen($output->image) < 1) {
                $image = '';
            } else {
                $image = URL::asset('uploads/store_images/' . $output->image);
            }
            array_push($locations, [
                'title'      => $output->name,
                'lat'        => $output->lat,
                'lng'        => $output->lng,
                'directions' => $output->maps_url,
                'thumbnail'  => $image
            ]);
        }
        return $locations;
    }

    public function filter($lat1, $lng1)
    {
        //$comparison = $this->cafe->orderby('lat', 'asc')->first();
        //$lat2 = $comparison->lat;
        //$lng2 = $comparison->lng;

        //$lat1 = 40.751754935372404;
        //$lng1 = -73.97476794280311;
        $lists = $this->cafe->orderby('lat', 'asc')->get();
        $filter = array();
        foreach ($lists as $list) {
            $answer = $this->distance($lat1, $lng1, $list->lat, $list->lng, 'm', 100, $list->id);
            if($answer) {
                array_push($filter, $answer);
            }
        }
        return $filter;
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit, $limit, $id)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        //$miles = round($miles);
        $location = $this->cafe->find($id);
        $array = array();
        if ($miles <= $limit) {
            array_push($array, [
                'miles' => $miles,
                'id'   => $location->id,
                'name' => $location->name,
                'lat' => $location->lat,
                'lng' => $location->lng,
                'state' => $location->state,
                'country' => $location->country
            ]);
            return $array;
        }
        return false;
        //return $miles;


//        if ($unit == "K") {
//            return ($miles * 1.609344);
//        } else if ($unit == "N") {
//            return ($miles * 0.8684);
//        } else {
//            return round($miles). ' Miles';
//        }
    }
}
