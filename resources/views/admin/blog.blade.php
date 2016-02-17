@extends('layouts.admin')

@section('page-header', 'Cookie Talk Blog')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default text-center">
            <div class="panel-body">
                <h3>Log Into Your Blog</h3>
                <p class="lead">Your login credentials are the same as your admin login credentials</p>
            </div>
            <div class="panel-footer text-center">
                <a href="{{ URL::to('blog/wp-login.php') }}" class="btn btn-primary btn-lg">Launch Wordpress Admin</a>
            </div>
        </div>
    </div>

@stop

@section('scripts')

@stop