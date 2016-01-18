@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Career <br/> Opportunities" !!}
@stop


@section('content')
    <section class="page">
        <div class="block header">
            <h2>We're Always Looking For Potential New Employees. Take A Look At Our Careers And See Where You Fit!</h2>
        </div>
        <div class="block dark">
            <p><a href="http://nestlecafe.com/library/pdf/employment-application.pdf" target="_blank">Download our employment application</a> or search below for available positions.</p>
            <iframe width="100%" height="768" class="career_embed" src="https://nestlecafe.hua.hrsmartpe.com/ats/job_search.php"></iframe>
        </div>
    </section>
@stop

@section('scripts')
@stop