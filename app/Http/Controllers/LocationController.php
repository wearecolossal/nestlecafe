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

    /**
     * GET FILTER OF LOCATIONS
     * @param $lat1
     * @param $lng1
     * @return array
     */
    public function filter($lat1, $lng1)
    {
        //$lat1 = 40.751754935372404;
        //$lng1 = -73.97476794280311;
        $lists = $this->cafe->where('lat', '!=', '')->whereNotNull('lat')->orderby('lat', 'asc')->get();
        return $this->filterQuery($lat1, $lng1, $lists);
    }

    public function orderFilter($lat1, $lng1)
    {
        $lists = $this->cafe->where('online_order', '!=', '')->orderby('lat', 'asc')->get();
        return $this->filterQuery($lat1, $lng1, $lists);
    }


    /**
     * GET DISTANCE BETWEEN LOCATION AND CAFES
     * @param $lat1
     * @param $lon1
     * @param $lat2
     * @param $lon2
     * @param $unit
     * @param $limit
     * @param $id
     * @return array|bool
     */
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
        if(strlen($location->image) < 1) {
            $image = URL::asset('library/img/loc-noimg.jpg');
        } else {
            $image = URL::asset('uploads/store_images/'.$location->image);
        }
        $array = array();
        if ($miles <= $limit) {
            array_push($array, [
                'image' => $image,
                'miles' => $miles,
                'id'   => $location->id,
                'name' => $location->name,
                'address' => $location->address.'<br/>'.$location->city.', '.$location->state.' '.$location->zip_code,
                'lat' => $location->lat,
                'lng' => $location->lng,
                'state' => $location->state,
                'country' => $location->country,
                'bakery' => $location->bakery,
                'icecream' => $location->icecream,
                'coffee' => $location->coffee,
                'frozenyogurt' => $location->frozenyogurt,
                'smoothies' => $location->smoothies,
                'wifi' => $location->wifi,
                'curbside' => $location->curbside,
                'cookie' => $location->cookie,
                'savory' => $location->savory,
                'map' => $location->maps_url,
                'facebook' => $location->facebook_url,
                'online_order' => $location->online_order
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

    /**
     * @param $lat1
     * @param $lng1
     * @param $lists
     * @return array
     */
    public function filterQuery($lat1, $lng1, $lists)
    {
        $filter = array();
        foreach ($lists as $list) {
            $answer = $this->distance($lat1, $lng1, $list->lat, $list->lng, 'm', 100, $list->id);
            if ($answer) {
                array_push($filter, $answer);
            }
        }
        return $filter;
    }

}
