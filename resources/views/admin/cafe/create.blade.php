@extends('layouts.admin')

@section('page-header', 'Create Cafe')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Cafe Information</div>
            {!! Form::open(['route' => 'admin.cafes.store', 'files' => true]) !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <img src="{{ URL::asset('library/img/loc-noimg.jpg') }}" style="max-width:100%;" alt="">
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('store_number', 'Store Number') !!}
                            {!! Form::text('store_number', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Store Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('state', 'State') !!}
                                {!! Form::text('state', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::text('country', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('zip_code', 'ZIP') !!}
                                {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('maps_url', 'Google Map URL') !!}
                            {!! Form::text('maps_url', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('facebook_url', 'Facebook URL') !!}
                            {!! Form::text('facebook_url', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('online_order', 'Online Order URL') !!}
                            {!! Form::text('online_order', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Cafe Services <em class="services-message text-success"></em>
            </div>
            <div class="panel-body">

                <div class="list-group cafe-services">
                    <a style="cursor: pointer" class="list-group-item" data-service="bakery"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Bakery {!! Form::hidden('bakery', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="cookie"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Cookies {!! Form::hidden('cookie', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="smoothies"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Smoothies {!! Form::hidden('smoothies', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="wifi"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Wifi {!! Form::hidden('wifi', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="curbside"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Curbside {!! Form::hidden('curbside', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="frozenyogurt"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Frozen Yogurt {!! Form::hidden('frozenyogurt', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="savory"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Savory {!! Form::hidden('savory', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="icecream"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Ice Cream {!! Form::hidden('icecream', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="coffee"><i class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Coffee {!! Form::hidden('coffee', 0) !!}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-footer text-center">
                {!! Form::submit('Update Cafe', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
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
    </script>
@stop