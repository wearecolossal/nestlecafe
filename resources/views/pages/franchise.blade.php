@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Franchising <br/> Opportunities" !!}
@stop


@section('content')
    <section class="page">
        <div class="block header">
            <h2 style="font-size:2em;">Life Is Full Of Treats</h2>
        </div>
        <div class="block dark">
            <h2 class="text-center">
                You Just Have To Know Where To Find Them
                <hr class="yellow-dotted-divider within">
            </h2>
            <p class="lead">
                We invite you to explore the Nestl&eacute;&reg; Toll House&reg; Cafe&reg; franchise overview and engage in the subsequent learning and discovery steps of our highly compelling business opportunity.
                <br> <br>
                Please note, there are six (6) engaging questions for you to answer as you review our brochure. Once you are finished, you will have the opportunity to complete our online application.
            </p>
            <div class="text-center">
                <hr class="yellow-dotted-divider within">
                <br>
                <a href="http://www.nestlecafefranchise.com/our-story.html" target="_blank" class="btn wired btn-lg">Visit Nestl&eacute; Franchising Site</a>
                <br><br>
            </div>
        </div>
    </section>
@stop

@section('scripts')
@stop