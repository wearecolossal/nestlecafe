@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Page Not Found" !!}
@stop

@section('wrapper', 'full')

@section('content')
    <section class="page">
        <div class="block header">
            <h2 style="font-size:2em;">The Page You Requested Was Not Found</h2>
        </div>
    </section>
    <div class="section image" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/section-404.jpg') }}" style="background-position-y: bottom !important;height:500px;" >
        <div class="container">
            <div class="content">
                <h1 style="margin-top:0;padding-top:0;margin-bottom:10px;">The page you’re looking for can not be found, or an error has occurred with the site.</h1>
                <p style="font-size:1em;width:80%;margin:0 auto;">
                    If you feel you’re reached this page in error, please fill out our <a href="{{ URL::to('contact') }}" style="color:inherit; text-decoration: underline">contact form</a> with details of your experience. Otherwise, please continue your browsing experience below.
                    <br><br>
                </p>
                <a href="{{ URL::to('/') }}" class="btn wired">Continue Browsing</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop

@section('scripts')
@stop