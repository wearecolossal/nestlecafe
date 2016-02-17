@extends('layouts.admin')

@section('page-header', 'Cookie Talk Blog')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default text-center">
            <div class="panel-body" style="background:url({{ URL::asset('uploads/page_banners/banner-cookie-talk.jpg') }}) bottom center; background-size:cover;color:#fff;text-shadow:0px 5px 4px rgba(0, 0, 0, .9)">
                <h3>Log Into Your Blog</h3>
                <p class="lead">Your login credentials are the same as your admin login credentials</p>
            </div>
            <div class="panel-footer text-center">
                <a href="{{ URL::to('blog') }}" class="btn btn-primary btn-lg">Launch Wordpress Admin</a>
            </div>
        </div>
    </div>

@stop

@section('scripts')

@stop