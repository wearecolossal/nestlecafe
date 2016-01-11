@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
 {!! "Life's Simple Pleasures" !!}
@stop

@section('wrapper', 'full')

@section('content')

    <div class="menulist">

        <a href="{{ URL::to('menu/icecream') }}" class="menulist-item one-third on-white" style="background:url({{ URL::asset('library/img/menu-ice-cream.jpg') }}) left top; background-size:cover;"><span>Ice Cream</span></a>
        <a href="{{ URL::to('menu/cookie-cakes') }}" class="menulist-item two-third on-white" style="background:url({{ URL::asset('library/img/menu-cookie-cakes.jpg') }}) right top; background-size:cover;"><span>Cookie Cakes</span></a>
        <a href="{{ URL::to('menu/bakery') }}" class="menulist-item two-third" style="background:url({{ URL::asset('library/img/menu-bakery.jpg') }}) left top; background-size:cover;"><span>Bakery</span></a>
        <a href="{{ URL::to('menu/real-fruit-smoothies') }}" class="menulist-item one-third" style="background:url({{ URL::asset('library/img/menu-real-fruit-smoothies.jpg') }}) right top; background-size:cover;"><span>Real Fruit Smoothies</></a>
        <a href="{{ URL::to('menu/savory') }}" class="menulist-item one-third" style="background:url({{ URL::asset('library/img/menu-savory.jpg') }}) left top; background-size:cover;"><span>Savory</span></a>
        <a href="{{ URL::to('menu/coffee') }}" class="menulist-item two-third" style="background:url({{ URL::asset('library/img/menu-coffee.jpg') }}) right top; background-size:cover;"><span>Coffee</span></a>
        <a href="{{ URL::to('menu/takeaway') }}" class="menulist-item two-third" style="background:url({{ URL::asset('library/img/menu-takeaway.jpg') }}) left top; background-size:cover;"><span>Takeway</span></a>
        <a href="{{ URL::to('menu/frozen-yogurt') }}" class="menulist-item one-third on-white" style="background:url({{ URL::asset('library/img/menu-frozen-yogurt.jpg') }}) right top; background-size:cover;"><span>Frozen Yogurt</span></a>

    </div>

@stop

@section('scripts')
@stop