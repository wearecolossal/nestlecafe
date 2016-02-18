@extends('layouts.admin')

@section('page-header', 'Homepage Callout Administration')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        @if(Session::get('success'))
        <div class="alert alert-success fade-away">
            {{ Session::get('success') }}
        </div>
        @endif
        {!! Form::open(['route' => ['admin.callouts.update', $callout->id], 'files' => true]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('callout_heading', 'Callout Heading') !!}
                        {!! Form::text('callout_heading', $callout->callout_heading, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('callout_subheading') !!}
                        {!! Form::text('callout_subheading', $callout->callout_subheading, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('callout_1', 'Small Callout') !!}
                            {!! Form::text('callout_1_text', $callout->callout_1_text, ['class' => 'form-control']) !!}
                            @if($callout->callout_1)
                                <img src="{{ URL::asset('uploads/homepage_callouts/'.$callout->callout_1) }}" style="width:100%; max-width:intrinsic" alt="">
                            @endif
                            {!! Form::file('callout_1', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('callout_1_on_white', 'Is This Text On A Light Image?') !!}<br>
                            <div class="btn-group">
                                <a data-value="1" data-active-class="btn-primary" class="btn btn-default {{ $callout->callout_1_on_white == 1 ? 'btn-primary' : null }}">Yes</a>
                                <a data-value="0" data-active-class="btn-primary" class="btn btn-default {{ $callout->callout_1_on_white == 0 ? 'btn-primary' : null }}">No</a>
                                {!! Form::hidden('callout_1_on_white', $callout->callout_1_on_white) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('callout_1_link', 'Callout Link') !!}
                            {!! Form::text('callout_1_link', $callout->callout_1_link, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::label('callout_2', 'Large Callout') !!}
                            {!! Form::text('callout_2_text', $callout->callout_2_text, ['class' => 'form-control']) !!}
                            @if($callout->callout_2)
                                <img src="{{ URL::asset('uploads/homepage_callouts/'.$callout->callout_2) }}" style="width:100%; max-width:intrinsic" alt="">
                            @endif
                            {!! Form::file('callout_2', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('callout_2_on_white', 'Is This Text On A Light Image?') !!}<br>
                            <div class="btn-group">
                                <a data-value="1" data-active-class="btn-primary" class="btn btn-default {{ $callout->callout_2_on_white == 1 ? 'btn-primary' : null }}">Yes</a>
                                <a data-value="0" data-active-class="btn-primary" class="btn btn-default {{ $callout->callout_2_on_white == 0 ? 'btn-primary' : null }}">No</a>
                                {!! Form::hidden('callout_2_on_white', $callout->callout_2_on_white) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('callout_2_link', 'Callout Link') !!}
                            {!! Form::text('callout_2_link', $callout->callout_2_link, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-center">
                {!! Form::submit('Update Callouts', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        applyValToHidden($('.btn-group a'));
    </script>
@stop