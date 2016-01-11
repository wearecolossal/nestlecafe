<?php

use Illuminate\Support\Facades\URL;

/**
 * @param $url
 * @return null|string
 * Detect if current URL is active and add an "active" class
 */
function isActive($url) {
    return URL::current() == URL::to($url) ? 'active' : null;
}