@extends('layouts.admin')

@section('page-header', 'Promotion PDF')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Upload the Promotion PDF
            </div>
            <div class="panel-body">
                <div class="alert alert-info">Please upload a PDF which will populate the <a href="{{ URL::to('promotions') }}">Promotions</a> page. If no PDF is uploaded, the promotions page will not be displayed</div>
                {!! Form::open(['files' => true]) !!}
                {!! Form::hidden('_method', 'POST') !!}
                <div class="form-group">
                    <label for="">Promotions PDF</label>
                    {!! Form::file('file') !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload PDF</button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">
                @if(\App\Promotion::hasFile()->first())
                    {!! Form::open(['url' => URL::to('admin/promotions/'.\App\Promotion::whereNotNull('created_at')->first()->id)]) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    <span class="label label-success">There is a file uploaded</span>
                    <hr>
                    <a href="{{ \App\Promotion::whereNotNull('created_at')->first()->file() }}" target="_blank" class="btn btn-success btn-sm">View PDF</a>

                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                    {!! Form::close() !!}

                @else
                    <span class="label label-danger">There is no file uploaded</span>
                @endif
            </div>
        </div>
    </div>

@stop

@section('scripts')
@stop