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