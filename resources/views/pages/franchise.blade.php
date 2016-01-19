@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Franchising <br/> Opportunities" !!}
@stop

@section('wrapper', 'full')

@section('content')
    <section class="page">
        <div class="block header">
            <h2 style="font-size:2em;">Life Is Full Of Treats</h2>
        </div>
    </section>
    <div class="section image" style="background:url({{ URL::asset('library/img/section-franchising-opportunities.jpg') }}); background-position-y: center !important;height:500px;">
        <div class="container">
            <div class="content">
                <h1 style="margin-top:0;padding-top:0;margin-bottom:10px;">You Just Have To Know <br> Where To Find Them</h1>
                <p style="font-size:1em;width:80%;margin:0 auto;">
                    We invite you to explore the Nestl&eacute;&reg; Toll House&reg; Cafe&reg; franchise overview and engage in the subsequent learning and discovery steps of our highly compelling business opportunity.
                    <br> <br>
                    Please note, there are six (6) engaging questions for you to answer as you review our brochure. Once you are finished, you will have the opportunity to complete our online application.
                    <br><br>
                </p>
                <a href="http://www.nestlecafefranchise.com/our-story.html" target="_blank" class="btn wired">Visit Nestl&eacute; Franchising Site</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop

@section('scripts')
@stop