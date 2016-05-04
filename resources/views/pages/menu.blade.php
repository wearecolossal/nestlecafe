@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
 {!! "Life's Simple Pleasures" !!}
@stop

@section('wrapper', 'enlarged')

@section('content')

    <div class="menulist">
        @foreach($categories as $category)
        <a href="{{ URL::to('menu/'.$category->url) }}" class="menulist-item {{ $category->grid == 1 ? 'one-third' : 'two-third' }} {{ $category->on_white == 1 ? 'on-white' : null }}"><img
                    src="{{ URL::asset('uploads/menu_list/'.$category->image) }}" alt=""><span>{{ $category->name }}</span></a>
        @endforeach
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <hr class="yellow-dotted-divider within">
        <div class="container compressed">

            <div class="block header">
                <h2>We’re committed to providing you complete, detailed nutritional information for our menu items</h2>
            </div>
            <div class="block transparent text-center">
                <p>
                    <a data-load="document" href="Nestle-Tollhouse-Cafe-by-Chip-Nutrition-Facts.pdf" target="_blank" class="btn btn-yellow white-text">Nutrition Fact Sheet</a>
                </p>
                <div class="allergy-info text-center" style="max-width:640px;margin-top:75px;">
                    <h1>Allergy Notice</h1>
                    <br>
                    <p>
                        Your health is of utmost concern to us. Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Caf&eacute; by Chip<sup>&reg;</sup> products are made on
                        equipment that processes peanuts and other nuts.
                    </p>
                    <br>
                    <em>Nutritional and allergy information available upon request.</em>
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')
@stop