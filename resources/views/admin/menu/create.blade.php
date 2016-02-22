@extends('layouts.admin')

@section('page-header', 'Create Menu Item')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @include('admin.partials.alerts')
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Menu Item
            </div>
            <div class="panel-body">
                {!! Form::open(['files' => true, 'route' => 'admin.menu.store']) !!}
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                        <small>Please upload a .jpg or .png image file that is <strong>700 × 525</strong> pixels in dimension.</small>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    {!! Form::label('name', 'Item Name') !!} <small>required</small>
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('on_white', 'Text Style') !!}<br>
                                    <div class="btn-group on_white">
                                        <a data-white="0" class="btn btn-default active btn-primary">Normal</a>
                                        <a data-white="1" class="btn btn-default">On White</a>
                                    </div>
                                    {!! Form::hidden('on_white', 0) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group">
                            {!! Form::label('category', 'Menu Category') !!}
                            <select name="category" id="category" class="form-control">
                                <option value="">Please Choose</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group">
                            {!! Form::label('order', 'Order on the list') !!}
                            <select name="order" id="order" class="form-control">
                                <option value="0">Please Choose</option>
                                @for($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!} <small>required</small>
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        {!! Form::submit('Create Menu Item', ['class' => 'btn btn-primary']) !!}
                        <a class="btn btn-default save-as-draft">Save As Draft</a>
                        <a href="{{ URL::to('admin/menu') }}" class="btn btn-danger">Do Not Save & Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        draft($('a.save-as-draft'), $('form.menu'));
        passValueToHidden($('.btn-group.on_white a'), 'white', $('input[name="on_white"]'), 'btn-default', 'btn-primary');
    </script>
@stop