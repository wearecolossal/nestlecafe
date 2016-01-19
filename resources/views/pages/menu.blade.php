@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
 {!! "Life's Simple Pleasures" !!}
@stop

@section('wrapper', 'enlarged')

@section('content')

    <div class="menulist">
        @foreach($categories as $category)
        <a href="{{ URL::to('menu/'.$category->url) }}" class="menulist-item {{ $category->grid == 1 ? 'one-third' : 'two-third' }} {{ $category->on_white == 1 ? 'on-white' : null }}" style="background:url({{ URL::asset('library/img/'.$category->image) }}) left top; background-size:cover;"><span>{{ $category->name }}</span></a>
        @endforeach
        <div class="clearfix"></div>
    </div>

@stop

@section('scripts')
@stop