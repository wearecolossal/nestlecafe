<?php

use Illuminate\Support\Facades\URL;

/**
 * @param $url
 * @return null|string
 * Detect if current URL is active and add an "active" class
 */
function isActive($url)
{
    return URL::current() == URL::to($url) ? 'active' : null;
}

function metaTitle($metaTitle = null) {
    $base = 'Nestlé® Toll House® Café By Chip';
    if($metaTitle) {
        return $metaTitle.' - '.$base;
    }
    return $base;
}

function cafeHasNoServices($id)
{
    $cafe = \App\Cafe::find($id);
    if (($cafe->bakery == 0) && ($cafe->cookie == 0) && ($cafe->curbside == 0) && ($cafe->wifi == 0) && ($cafe->smoothies == 0) && ($cafe->frozenyogurt == 0) && ($cafe->icecream == 0) && ($cafe->savory == 0)) {
        return '<small class="text-danger"><em>No Services Added</em></small>';
    }
    return false;
}

function menu301s($url)
{
    switch ($url) {
        case 'icecream':
            return redirect('menu/ice-cream');
            break;
        case 'cookiecakes':
            return redirect('menu/cookie-cakes');
            break;
        case 'nescafe':
            return redirect('menu/coffee');
            break;
        case 'frozenyogurt':
            return redirect('menu/frozen-yogurt');
            break;
        case 'smoothies':
            return redirect('menu/real-fruit-smoothies');
            break;
        case 'catering':
            return redirect('menu/take-away');
            break;
        default:
            return false;
    }
}

function timeHTMLSelect($selected = null, $default = null) {
    if($selected) {
        $value = $selected;
    } else {
        $value = null;
    }
    $times = array(
        0 => ['military' => '12:00 am', 'standard' => '12:00 am', 'select' => timeIsChosen('12:00 am', $value, $default)],
        1 => ['military' => '12:15 am', 'standard' => '12:15 am', 'select' => timeIsChosen('12:15 am', $value, $default)],
        2 => ['military' => '12:30 am', 'standard' => '12:30 am', 'select' => timeIsChosen('12:30 am', $value, $default)],
        3 => ['military' => '12:45 am', 'standard' => '12:45 am', 'select' => timeIsChosen('12:45 am', $value, $default)],
        4 => ['military' => '1:00 am', 'standard' => '1:00 am', 'select' => timeIsChosen('1:00 am', $value, $default)],
        5 => ['military' => '1:15 am', 'standard' => '1:15 am', 'select' => timeIsChosen('1:15 am', $value, $default)],
        6 => ['military' => '1:30 am', 'standard' => '1:30 am', 'select' => timeIsChosen('1:30 am', $value, $default)],
        7 => ['military' => '1:45 am', 'standard' => '1:45 am', 'select' => timeIsChosen('1:45 am', $value, $default)],
        8 => ['military' => '2:00 am', 'standard' => '2:00 am', 'select' => timeIsChosen('2:00 am', $value, $default)],
        9 => ['military' => '2:15 am', 'standard' => '2:15 am', 'select' => timeIsChosen('2:15 am', $value, $default)],
        10 => ['military' => '2:30 am', 'standard' => '2:30 am', 'select' => timeIsChosen('2:30 am', $value, $default)],
        11 => ['military' => '2:45 am', 'standard' => '2:45 am', 'select' => timeIsChosen('2:45 am', $value, $default)],
        12 => ['military' => '3:00 am', 'standard' => '3:00 am', 'select' => timeIsChosen('3:00 am', $value, $default)],
        13 => ['military' => '3:15 am', 'standard' => '3:15 am', 'select' => timeIsChosen('3:15 am', $value, $default)],
        14 => ['military' => '3:30 am', 'standard' => '3:30 am', 'select' => timeIsChosen('3:30 am', $value, $default)],
        15 => ['military' => '3:45 am', 'standard' => '3:45 am', 'select' => timeIsChosen('3:45 am', $value, $default)],
        16 => ['military' => '4:00 am', 'standard' => '4:00 am', 'select' => timeIsChosen('4:00 am', $value, $default)],
        17 => ['military' => '4:15 am', 'standard' => '4:15 am', 'select' => timeIsChosen('4:15 am', $value, $default)],
        18 => ['military' => '4:30 am', 'standard' => '4:30 am', 'select' => timeIsChosen('4:30 am', $value, $default)],
        19 => ['military' => '4:45 am', 'standard' => '4:45 am', 'select' => timeIsChosen('4:45 am', $value, $default)],
        20 => ['military' => '5:00 am', 'standard' => '5:00 am', 'select' => timeIsChosen('5:00 am', $value, $default)],
        21 => ['military' => '5:15 am', 'standard' => '5:15 am', 'select' => timeIsChosen('5:15 am', $value, $default)],
        22 => ['military' => '5:30 am', 'standard' => '5:30 am', 'select' => timeIsChosen('5:30 am', $value, $default)],
        23 => ['military' => '5:45 am', 'standard' => '5:45 am', 'select' => timeIsChosen('5:45 am', $value, $default)],
        24 => ['military' => '6:00 am', 'standard' => '6:00 am', 'select' => timeIsChosen('6:00 am', $value, $default)],
        25 => ['military' => '6:15 am', 'standard' => '6:15 am', 'select' => timeIsChosen('6:15 am', $value, $default)],
        26 => ['military' => '6:30 am', 'standard' => '6:30 am', 'select' => timeIsChosen('6:30 am', $value, $default)],
        27 => ['military' => '6:45 am', 'standard' => '6:45 am', 'select' => timeIsChosen('6:45 am', $value, $default)],
        28 => ['military' => '7:00 am', 'standard' => '7:00 am', 'select' => timeIsChosen('7:00 am', $value, $default)],
        29 => ['military' => '7:15 am', 'standard' => '7:15 am', 'select' => timeIsChosen('7:15 am', $value, $default)],
        30 => ['military' => '7:30 am', 'standard' => '7:30 am', 'select' => timeIsChosen('7:30 am', $value, $default)],
        31 => ['military' => '7:45 am', 'standard' => '7:45 am', 'select' => timeIsChosen('7:45 am', $value, $default)],
        32 => ['military' => '8:00 am', 'standard' => '8:00 am', 'select' => timeIsChosen('8:00 am', $value, $default)],
        33 => ['military' => '8:15 am', 'standard' => '8:15 am', 'select' => timeIsChosen('8:15 am', $value, $default)],
        34 => ['military' => '8:30 am', 'standard' => '8:30 am', 'select' => timeIsChosen('8:30 am', $value, $default)],
        35 => ['military' => '8:45 am', 'standard' => '8:45 am', 'select' => timeIsChosen('8:45 am', $value, $default)],
        36 => ['military' => '9:00 am', 'standard' => '9:00 am', 'select' => timeIsChosen('9:00 am', $value, $default)],
        37 => ['military' => '9:15 am', 'standard' => '9:15 am', 'select' => timeIsChosen('9:15 am', $value, $default)],
        38 => ['military' => '9:30 am', 'standard' => '9:30 am', 'select' => timeIsChosen('9:30 am', $value, $default)],
        39 => ['military' => '9:45 am', 'standard' => '9:45 am', 'select' => timeIsChosen('9:45 am', $value, $default)],
        40 => ['military' => '10:00 am', 'standard' => '10:00 am', 'select' => timeIsChosen('10:00 am', $value, $default)],
        41 => ['military' => '10:15 am', 'standard' => '10:15 am', 'select' => timeIsChosen('10:15 am', $value, $default)],
        42 => ['military' => '10:30 am', 'standard' => '10:30 am', 'select' => timeIsChosen('10:30 am', $value, $default)],
        43 => ['military' => '10:45 am', 'standard' => '10:45 am', 'select' => timeIsChosen('10:45 am', $value, $default)],
        44 => ['military' => '11:00 am', 'standard' => '11:00 am', 'select' => timeIsChosen('11:00 am', $value, $default)],
        45 => ['military' => '11:15 am', 'standard' => '11:15 am', 'select' => timeIsChosen('11:15 am', $value, $default)],
        46 => ['military' => '11:30 am', 'standard' => '11:30 am', 'select' => timeIsChosen('11:30 am', $value, $default)],
        47 => ['military' => '11:45 am', 'standard' => '11:45 am', 'select' => timeIsChosen('11:45 am', $value, $default)],
        48 => ['military' => '12:00 pm', 'standard' => '12:00 pm', 'select' => timeIsChosen('12:00 pm', $value, $default)],
        49 => ['military' => '12:15 pm', 'standard' => '12:15 pm', 'select' => timeIsChosen('12:15 pm', $value, $default)],
        50 => ['military' => '12:30 pm', 'standard' => '12:30 pm', 'select' => timeIsChosen('12:30 pm', $value, $default)],
        51 => ['military' => '12:45 pm', 'standard' => '12:45 pm', 'select' => timeIsChosen('12:45 pm', $value, $default)],
        52 => ['military' => '1:00 pm', 'standard' => '1:00 pm', 'select' => timeIsChosen('1:00 pm', $value, $default)],
        53 => ['military' => '1:15 pm', 'standard' => '1:15 pm', 'select' => timeIsChosen('1:15 pm', $value, $default)],
        54 => ['military' => '1:30 pm', 'standard' => '1:30 pm', 'select' => timeIsChosen('1:30 pm', $value, $default)],
        55 => ['military' => '1:45 pm', 'standard' => '1:45 pm', 'select' => timeIsChosen('1:45 pm', $value, $default)],
        56 => ['military' => '2:00 pm', 'standard' => '2:00 pm', 'select' => timeIsChosen('2:00 pm', $value, $default)],
        57 => ['military' => '2:15 pm', 'standard' => '2:15 pm', 'select' => timeIsChosen('2:15 pm', $value, $default)],
        58 => ['military' => '2:30 pm', 'standard' => '2:30 pm', 'select' => timeIsChosen('2:30 pm', $value, $default)],
        59 => ['military' => '2:45 pm', 'standard' => '2:45 pm', 'select' => timeIsChosen('2:45 pm', $value, $default)],
        60 => ['military' => '3:00 pm', 'standard' => '3:00 pm', 'select' => timeIsChosen('3:00 pm', $value, $default)],
        61 => ['military' => '3:15 pm', 'standard' => '3:15 pm', 'select' => timeIsChosen('3:15 pm', $value, $default)],
        62 => ['military' => '3:30 pm', 'standard' => '3:30 pm', 'select' => timeIsChosen('3:30 pm', $value, $default)],
        63 => ['military' => '3:45 pm', 'standard' => '3:45 pm', 'select' => timeIsChosen('3:45 pm', $value, $default)],
        64 => ['military' => '4:00 pm', 'standard' => '4:00 pm', 'select' => timeIsChosen('4:00 pm', $value, $default)],
        65 => ['military' => '4:15 pm', 'standard' => '4:15 pm', 'select' => timeIsChosen('4:15 pm', $value, $default)],
        66 => ['military' => '4:30 pm', 'standard' => '4:30 pm', 'select' => timeIsChosen('4:30 pm', $value, $default)],
        67 => ['military' => '4:45 pm', 'standard' => '4:45 pm', 'select' => timeIsChosen('4:45 pm', $value, $default)],
        68 => ['military' => '5:00 pm', 'standard' => '5:00 pm', 'select' => timeIsChosen('5:00 pm', $value, $default)],
        69 => ['military' => '5:15 pm', 'standard' => '5:15 pm', 'select' => timeIsChosen('5:15 pm', $value, $default)],
        70 => ['military' => '5:30 pm', 'standard' => '5:30 pm', 'select' => timeIsChosen('5:30 pm', $value, $default)],
        71 => ['military' => '5:45 pm', 'standard' => '5:45 pm', 'select' => timeIsChosen('5:45 pm', $value, $default)],
        72 => ['military' => '6:00 pm', 'standard' => '6:00 pm', 'select' => timeIsChosen('6:00 pm', $value, $default)],
        73 => ['military' => '6:15 pm', 'standard' => '6:15 pm', 'select' => timeIsChosen('6:15 pm', $value, $default)],
        74 => ['military' => '6:30 pm', 'standard' => '6:30 pm', 'select' => timeIsChosen('6:30 pm', $value, $default)],
        75 => ['military' => '6:45 pm', 'standard' => '6:45 pm', 'select' => timeIsChosen('6:45 pm', $value, $default)],
        76 => ['military' => '7:00 pm', 'standard' => '7:00 pm', 'select' => timeIsChosen('7:00 pm', $value, $default)],
        77 => ['military' => '7:15 pm', 'standard' => '7:15 pm', 'select' => timeIsChosen('7:15 pm', $value, $default)],
        78 => ['military' => '7:30 pm', 'standard' => '7:30 pm', 'select' => timeIsChosen('7:30 pm', $value, $default)],
        79 => ['military' => '7:45 pm', 'standard' => '7:45 pm', 'select' => timeIsChosen('7:45 pm', $value, $default)],
        80 => ['military' => '8:00 pm', 'standard' => '8:00 pm', 'select' => timeIsChosen('8:00 pm', $value, $default)],
        81 => ['military' => '8:15 pm', 'standard' => '8:15 pm', 'select' => timeIsChosen('8:15 pm', $value, $default)],
        82 => ['military' => '8:30 pm', 'standard' => '8:30 pm', 'select' => timeIsChosen('8:30 pm', $value, $default)],
        83 => ['military' => '8:45 pm', 'standard' => '8:45 pm', 'select' => timeIsChosen('8:45 pm', $value, $default)],
        84 => ['military' => '9:00 pm', 'standard' => '9:00 pm', 'select' => timeIsChosen('9:00 pm', $value, $default)],
        85 => ['military' => '9:15 pm', 'standard' => '9:15 pm', 'select' => timeIsChosen('9:15 pm', $value, $default)],
        86 => ['military' => '9:30 pm', 'standard' => '9:30 pm', 'select' => timeIsChosen('9:30 pm', $value, $default)],
        87 => ['military' => '9:45 pm', 'standard' => '9:45 pm', 'select' => timeIsChosen('9:45 pm', $value, $default)],
        88 => ['military' => '10:00 pm', 'standard' => '10:00 pm', 'select' => timeIsChosen('10:00 pm', $value, $default)],
        89 => ['military' => '10:15 pm', 'standard' => '10:15 pm', 'select' => timeIsChosen('10:15 pm', $value, $default)],
        90 => ['military' => '10:30 pm', 'standard' => '10:30 pm', 'select' => timeIsChosen('10:30 pm', $value, $default)],
        91 => ['military' => '10:45 pm', 'standard' => '10:45 pm', 'select' => timeIsChosen('10:45 pm', $value, $default)],
        92 => ['military' => '11:00 pm', 'standard' => '11:00 pm', 'select' => timeIsChosen('11:00 pm', $value, $default)],
        93 => ['military' => '11:15 pm', 'standard' => '11:15 pm', 'select' => timeIsChosen('11:15 pm', $value, $default)],
        94 => ['military' => '11:30 pm', 'standard' => '11:30 pm', 'select' => timeIsChosen('11:30 pm', $value, $default)],
        95 => ['military' => '11:45 pm', 'standard' => '11:45 pm', 'select' => timeIsChosen('11:45 pm', $value, $default)]
    );
    $listElements = '';
    for($i = 0; $i <= 95; $i++) {
        //$listElements = $listElements + '<option value="'.$times[$i]['military'].'">'.$times[$i]['standard'].'</option>';
        $listElements .= '<option '.$times[$i]['select'].' value="'.$times[$i]['military'].'">'.$times[$i]['standard'].'</option>';
    }
    return $listElements;
}

function timeIsChosen($time, $value, $default = null) {
    if($value == $time) {
        return 'selected';
    }
    if($default) {
        if($time == $default) {
            return 'selected';
        }
    }
    return null;
}

function dayList() {
    $days = [
        0 => ['lowercase' => 'monday', 'regular' => 'Monday'],
        1 => ['lowercase' => 'tuesday', 'regular' => 'Tuesday'],
        2 => ['lowercase' => 'wednesday', 'regular' => 'Wednesday'],
        3 => ['lowercase' => 'thursday', 'regular' => 'Thursday'],
        4 => ['lowercase' => 'friday', 'regular' => 'Friday'],
        5 => ['lowercase' => 'saturday', 'regular' => 'Saturday'],
        6 => ['lowercase' => 'sunday', 'regular' => 'Sunday']
    ];
    return $days;
}

function checkIfLoggedIn() {
    if(!\Illuminate\Support\Facades\Auth::check()) {
        return redirect('login');
    }
}