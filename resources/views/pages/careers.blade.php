@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Career <br/> Opportunities" !!}
@stop


@section('content')
    {{--<section class="page">--}}
        {{--<div class="block header">--}}
            {{--<h2>We're Always Looking For Potential New Employees. Take A Look At Our Careers And See Where You Fit!</h2>--}}
        {{--</div>--}}
        {{--<div class="block dark">--}}
            {{--<p><a href="http://nestlecafe.com/library/pdf/employment-application.pdf" target="_blank">Download our employment application</a> or search below for available positions.</p>--}}
            {{--<iframe width="100%" height="1200" class="career_embed" src="https://nestlecafe.hua.hrsmartpe.com/ats/job_search.php"></iframe>--}}
        {{--</div>--}}
    {{--</section>--}}
    <div class="section image" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/bg-careers.jpg') }}" style="background-position-y: center !important;height:500px;">
        <div class="container">
            <div class="content">
                <h1 style="margin-top:0;padding-top:0;margin-bottom:10px;">Download Our Employment Application</h1>
                {{--<p style="font-size:1em;width:80%;margin:0 auto;">--}}
                    {{--We invite you to explore the Nestl&eacute;&reg; Toll House&reg; Cafe&reg; franchise overview and engage in the subsequent learning and discovery steps of our highly compelling business opportunity.--}}
                    {{--<br> <br>--}}
                    {{--Please note, there are six (6) engaging questions for you to answer as you review our brochure. Once you are finished, you will have the opportunity to complete our online application.--}}
                    {{--<br><br>--}}
                {{--</p>--}}
                <a href="{{ URL::to('library/pdf/employment-application.pdf') }}" target="_blank" class="btn wired">Download</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop

@section('scripts')
@stop