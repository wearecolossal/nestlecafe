@extends('layouts.admin')

@section('page-header', 'Edit Menu Item')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @include('admin.partials.alerts')
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $item->name }}
            </div>
            <div class="panel-body">
                {!! Form::open(['files' => true, 'route' => ['admin.menu.update', $item->id]]) !!}
                    {!! Form::hidden('_method', 'PUT') !!}
                <div class="row">
                    <div class="col-md-12">
                        @if($item->image)
                            <img src="{{ URL::asset('uploads/menu_items/'.$item->image) }}" style="width:100%;max-width:intrinsic;" alt="">
                        @endif
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    {!! Form::label('name', 'Item Name') !!}
                                    {!! Form::text('name', $item->name, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('on_white', 'Text Style') !!}<br>
                                    <div class="btn-group on_white">
                                        <a data-white="0" class="btn btn-default{{ $item->on_white == 0 ? 'active btn-primary' : null }}">Normal</a>
                                        <a data-white="1" class="btn btn-default{{ $item->on_white == 1 ? 'active btn-primary' : null }}">On White</a>
                                    </div>
                                    {!! Form::hidden('on_white', $item->on_white) !!}
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
                                    <option value="{{ $category->id }}" {{ $item->category == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
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
                                    <option value="{{ $i }}" {{ $i == $item->order ? 'selected' : null }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', $item->description, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
           passValueToHidden($('.btn-group.on_white a'), 'white', $('input[name="on_white"]'), 'btn-default', 'btn-primary');
    </script>
@stop