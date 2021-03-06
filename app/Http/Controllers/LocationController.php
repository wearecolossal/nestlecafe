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
        $outputs = $this->cafe->where('archive', 0)->where('draft', 0)->orderby('lat', 'asc')->get();
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
    public function filter($lat1, $lng1, $miles = 100)
    {
        $lists = $this->cafe->where('lat', '!=', '')->whereNotNull('lat')->where('draft', 0)->where('archive', 0)->orderby('lat', 'asc')->get();
        return $this->filterQuery($lat1, $lng1, $lists, $miles);
    }

    public function orderFilter($lat1, $lng1, $miles = 100)
    {
        $lists = $this->cafe->where('online_order', '!=', '')->where('draft', 0)->where('archive', 0)->orderby('lat', 'asc')->get();
        return $this->filterQuery($lat1, $lng1, $lists, $miles);
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
        $phone = $location->phone ? '<br/>'.$location->phone : null;
        if(strlen($location->image) < 1) {
            $image = URL::asset('library/img/loc-noimg.jpg');
        } else {
            $image = URL::asset('uploads/store_images/'.$location->image);
        }
        $array = array();

        $hours = '
        '.($location->monday_open ? '<strong>Mon</strong> '.$location->monday_start.'-'.$location->monday_end.'<br/>' : null).'
        '.($location->tuesday_open ? '<strong>Tue</strong> '.$location->tuesday_start.'-'.$location->tuesday_end.'<br/>' : null).'
        '.($location->wednesday_open ? '<strong>Wed</strong> '.$location->wednesday_start.'-'.$location->wednesday_end.'<br/>' : null).'
        '.($location->thursday_open ? '<strong>Thu</strong> '.$location->thursday_start.'-'.$location->thursday_end.'<br/>' : null).'
        '.($location->friday_open ? '<strong>Fri</strong> '.$location->friday_start.'-'.$location->friday_end.'<br/>' : null).'
        '.($location->saturday_open ? '<strong>Sat</strong> '.$location->saturday_start.'-'.$location->saturday_end.'<br/>' : null).'
        '.($location->sunday_open ? '<strong>Sun</strong> '.$location->sunday_start.'-'.$location->sunday_end.'<br/>' : null).'
        ';
        if ($miles <= $limit) {
            array_push($array, [
                'image' => $image,
                'miles' => intval($miles),
                'id'   => $location->id,
                'name' => $location->name,
                'address' => $location->address.'<br/>'.$location->city.', '.$location->state.' '.$location->zip_code.$phone,
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
                'online_order' => $location->online_order,
                'coming_soon' => $location->coming_soon,
                'hours' => strlen($hours) > 0 ? '<strong>Hours</strong><br/>'.$hours : null
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
    public function filterQuery($lat1, $lng1, $lists, $miles = 100)
    {
        $filter = array();
//        if($lat1 == '56.130366' && $lng1 == '-106.34677099999999') {
//            $miles = 3000;
//        }
        foreach ($lists as $list) {
            $answer = $this->distance($lat1, $lng1, $list->lat, $list->lng, 'm', $miles, $list->id);
            if ($answer) {
                array_push($filter, $answer);
            }
        }
        return $filter;
    }

    public function searchByCountry(Request $request) {
        $country = $request['country'];
        if($request['online-order'] == 1) {
            return $this->cafe->where('archive', 0)->where('draft', 0)->where('country', $country)->where('online_order', '!=', '')->groupby('state')->orderby('state', 'asc')->lists('state');
        }
        return $this->cafe->where('archive', 0)->where('draft', 0)->where('country', $country)->groupby('state')->orderby('state', 'asc')->lists('state');
    }

    public function searchByState(Request $request) {
        $state = $request['state'];
        if($request['online-order'] == 1) {
            return $this->cafe->where('archive', 0)->where('draft', 0)->where('state', $state)->where('online_order', '!=', '')->groupby('city')->orderby('city', 'asc')->lists('city');
        }
        return $this->cafe->where('archive', 0)->where('draft', 0)->where('state', $state)->groupby('city')->orderby('city', 'asc')->lists('city');
    }

    public function listStoresByCountry(Request $request) {
        $country = $request['country'];
        if($request['online-order'] == 1) {
            return $this->cafe->where('archive', 0)->where('draft', 0)->where('country', $country)->where('online_order', '!=', '')->orderby('store_number', 'asc')->get();
        }
        return $this->cafe->where('archive', 0)->where('draft', 0)->where('country', $country)->orderby('store_number', 'asc')->get();
    }

    public function listStoresByCity(Request $request) {
        $city = $request['city'];
        if($request['online-order'] == 1) {
            return $this->cafe->where('archive', 0)->where('draft', 0)->where('city', $city)->where('online_order', '!=', '')->orderby('store_number', 'asc')->get();
        }
        return $this->cafe->where('archive', 0)->where('draft', 0)->where('city', $city)->orderby('store_number', 'asc')->get();
    }
}
