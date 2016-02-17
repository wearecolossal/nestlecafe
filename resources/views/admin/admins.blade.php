@extends('layouts.admin')

@section('page-header', 'Admins')

@section('content')

    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr class="active">
                    <th style="width:75px">ID</th>
                    <th width="75">Image</th>
                    <th>Name</th>
                    <th class="actions">Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>
                            #{{ sprintf("%03d", $admin->id) }}
                        </td>
                        <td style="padding:0;"><img src="{{ URL::asset('uploads/admins/'.$admin->photo) }}" width="75"
                                                    alt=""></td>
                        <td> {{ $admin->first_name.' '.$admin->last_name }}</td>
                        <td class="actions">{{ $admin->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('scripts')

@stop