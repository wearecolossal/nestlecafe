@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Contact Us" !!}
@stop


@section('content')
    <section class="page">
        <div class="block header">
            <h2>
                Thank you! We will get back to you momentarily. <br> <a href="{{ URL::to('/') }}">Return To Home</a>.
            </h2>
            <hr class="yellow-dotted-divider within">
            <br>

        </div>
        <div class="clearfix"></div>
    </section>
@stop

@section('scripts')

@stop