@extends('layouts.admin')

@section('page-header', 'Edit Cafe ('.$cafe->name.')')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Cafe Information</div>
            {!! Form::open(['route' => ['admin.cafes.update', $cafe->id]]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <img src="{{ URL::asset('uploads/store_images/'.$cafe->image) }}" width="100%" class="{{ !$cafe->image ? 'hidden' : null }}" alt="">
                        <img src="{{ URL::asset('library/img/loc-noimg.jpg') }}" style="max-width:100%;" class="{{ $cafe->image ? 'hidden' : null }}" alt="">
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('store_number', 'Store Number') !!}
                            {!! Form::text('store_number', $cafe->store_number, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Store Name') !!}
                            {!! Form::text('name', $cafe->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', $cafe->address, ['class' => 'form-control']) !!}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', $cafe->city, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('state', 'State') !!}
                                {!! Form::text('state', $cafe->state, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::text('country', $cafe->country, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('zip_code', 'ZIP') !!}
                                {!! Form::text('zip_code', $cafe->zip_code, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('maps_url', 'Google Map URL') !!}
                            {!! Form::text('maps_url', $cafe->maps_url, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6 form-group" style="position:relative;">
                        <img width="320" style="width:100% !important;max-width:320px !important;" src="http://maps.googleapis.com/maps/api/staticmap?center={{ $cafe->lat.','.$cafe->lng }}&zoom=13&scale=2&size=320x320&maptype=roadmap&format=png&visual_refresh=true&markers=size:medium%7Ccolor:0x2E1A11%7Clabel:%7C{{ $cafe->lat.','.$cafe->lng }}" class="img-circled" alt="Google Map of Albany, NY">
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('facebook_url', 'Facebook URL') !!}
                            {!! Form::text('facebook_url', $cafe->facebook_url, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('online_order', 'Online Order URL') !!}
                            {!! Form::text('online_order', $cafe->online_order, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-center">
                {!! Form::submit('Update Cafe', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Cafe Services <em class="services-message text-success"></em>
            </div>
            <div class="panel-body">

                <div class="list-group cafe-services">
                    {!! Form::open(['route' => ['cafe.update-services', $cafe->id], 'class' => 'update-services']) !!}
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->bakery == 1 ? 'active' : null }}" data-service="bakery" data-value="{{ $cafe->bakery == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->bakery == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->bakery == 1 ? 'hidden' : null }}"></i> Bakery {!! Form::hidden('bakery', $cafe->bakery) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->cookie == 1 ? 'active' : null }}" data-service="cookie" data-value="{{ $cafe->cookie == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->cookie == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->cookie == 1 ? 'hidden' : null }}"></i> Cookies {!! Form::hidden('cookie', $cafe->cookie) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->smoothies == 1 ? 'active' : null }}" data-service="smoothies" data-value="{{ $cafe->smoothies == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->smoothies == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->smoothies == 1 ? 'hidden' : null }}"></i> Smoothies {!! Form::hidden('smoothies', $cafe->smoothies) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->wifi == 1 ? 'active' : null }}" data-service="wifi" data-value="{{ $cafe->wifi == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->wifi == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->wifi == 1 ? 'hidden' : null }}"></i> Wifi {!! Form::hidden('wifi', $cafe->wifi) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->curbside == 1 ? 'active' : null }}" data-service="curbside" data-value="{{ $cafe->curbside == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->curbside == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->curbside == 1 ? 'hidden' : null }}"></i> Curbside {!! Form::hidden('curbside', $cafe->curbside) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->frozenyogurt == 1 ? 'active' : null }}" data-service="frozenyogurt" data-value="{{ $cafe->frozenyogurt == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->frozenyogurt == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->frozenyogurt == 1 ? 'hidden' : null }}"></i> Frozen Yogurt {!! Form::hidden('frozenyogurt', $cafe->frozenyogurt) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->savory == 1 ? 'active' : null }}" data-service="savory" data-value="{{ $cafe->savory == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->savory == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->savory == 1 ? 'hidden' : null }}"></i> Savory {!! Form::hidden('savory', $cafe->savory) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->icecream == 1 ? 'active' : null }}" data-service="icecream" data-value="{{ $cafe->icecream == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->icecream == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->icecream == 1 ? 'hidden' : null }}"></i> Ice Cream {!! Form::hidden('icecream', $cafe->icecream) !!}</a>
                    <a style="cursor: pointer" class="list-group-item {{ $cafe->coffee == 1 ? 'active' : null }}" data-service="coffee" data-value="{{ $cafe->coffee == 1 ? 1 : 0 }}"><i class="glyphicon glyphicon-ok {{ $cafe->coffee == 0 ? 'hidden' : null }}"></i> <i class="glyphicon glyphicon-tag {{ $cafe->coffee == 1 ? 'hidden' : null }}"></i> Coffee {!! Form::hidden('coffee', $cafe->coffee) !!}</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
           $('.cafe-services a').on('click', function(){
               var inputField = $(this).find('input');
               $(this).toggleClass('active');
               $(this).find('i.glyphicon-ok').toggleClass('hidden');
               $(this).find('i.glyphicon-tag').toggleClass('hidden');
               if(inputField.val() == '0') {
                   inputField.val(1);
               } else {
                   inputField.val(0);
               }
           });
           $('.cafe-services a').on('click', function(){
              var url = $(this).parent().attr('action');
               var fields = $('form.update-services').serialize();
              $.ajax({
                 method: 'POST',
                  url: url,
                  data: fields
              }).done(function(){
                    $('.services-message').html('<span>Services Updated!</span>');
                  setTimeout(function(){
                      $('.services-message span').fadeOut(500);
                  }, 2000);
              });
           });
    </script>
@stop