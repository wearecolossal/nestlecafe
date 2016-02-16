@extends('layouts.admin')

@section('page-header', 'Cafe Administration')

@section('content')
    <div class="col-md-12">
        <a href="{{ URL::to('admin/cafes/create') }}" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Add Cafe</a>
        <br><br>
    </div>
    <div class="col-md-12 table-responsive">
        <table class="table table-condensed table-bordered">
            <thead>
            <tr class="active">
                <th style="width:75px">Store #</th>
                <th>Name</th>
                <th>Services</th>
                <th>City, State, Country</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cafes as $cafe)
                <tr class="{{ !$cafe->image ? 'danger' : null }}">
                    <td>#{{ sprintf('%04d', $cafe->store_number) }}</td>
                    <td>{{ $cafe->name }} {!! !$cafe->image ? '<small class="text-danger"><em>No Image</em></small>' : null !!}</td>
                    <td>
                        <span class="{{ $cafe->bakery != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-bakery.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->coffee != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-coffee.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->cookie != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-cookie.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->curbside != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-curbside.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->frozenyogurt != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-frozenyogurt.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->icecream != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-icecream.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->savory != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-savory.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->smoothies != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-smoothies.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->wifi != 1 ? 'hidden' : null }}"><img src="{{ URL::asset('library/img/loc-wifi.png') }}" width="20" alt=""></span>
                        {!! cafeHasNoServices($cafe->id) !!}
                    </td>
                    <td>{{ $cafe->city.', '.$cafe->state.' '.$cafe->country }}</td>
                    <td>
                        <a href="{{ URL::to('admin/cafes/'.$cafe->id.'/edit') }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('scripts')
@stop