@extends('layouts.admin')

@section('page-header', 'Edit Menu Category')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $item->name }}
            </div>
            {!! Form::open(['files' => true, 'route' => ['admin.menu.categories.update']]) !!}
            <div class="panel-body">
                <div class="col-md-12">
                    @if($item->image)
                        <img src="{{ URL::asset('uploads/menu_list/'.$item->image) }}" style="width:100%;max-width:intrinsic;" alt="">
                    @endif
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                        <hr>
                </div>
                <div class="col-md-12">
                    <div class="form-group category-grid">
                        {!! Form::label('grid', 'Layout') !!}
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-xs-8"><a data-grid="2" class="{{ $item->grid == 2 ? 'active' : null }}">Wide Column</a></div>
                            <div class="col-xs-4"><a data-grid="1" class="{{ $item->grid == 1 ? 'active' : null }}">Narrow Column</a></div>
                        </div>
                        <div class="clearfix"></div>
                        {!! Form::hidden('grid', $item->grid) !!}
                        <hr>
                    </div>
                    <div class="form-group">
                        {!! Form::label('on_white', 'Text Style') !!} <small>For the menu page</small>
                        <br>
                        <div class="btn-group on_white">
                            <a data-white="0" class="btn btn-default {{ $item->on_white == 0 ? 'btn-primary' : null }}">Normal</a>
                            <a data-white="1" class="btn btn-default {{ $item->on_white == 1 ? 'btn-primary' : null }}">On White</a>
                        </div>
                        {!! Form::hidden('on_white', $item->on_white) !!}
                    </div>
                    <hr>
                </div>
                <div class="col-md-12">
                    @if($item->banner)
                        <img src="{{ URL::asset('uploads/menu_banners/'.$item->banner) }}" style="width:100%;max-width:intrinsic;" alt="">
                    @endif
                    {!! Form::file('banner', ['class' => 'form-control']) !!}
                        <hr>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('list_order', 'Menu Page Order') !!}
                        <select name="list_order" id="list_order" class="form-control">
                            <option value="0" {{ $item->list_order == 0 ? 'selected' : null }}>Hide</option>
                            @for($i = 1; $i <= 100; $i++)
                                <option value="{{ $i }}" {{ $item->list_order == $i ? 'selected' : null }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('order', 'Menu Navigation Order') !!}
                        <select name="order" id="order" class="form-control">
                            @for($i = 0; $i <= 100; $i++)
                                <option value="{{ $i }}" {{ $item->order == $i ? 'selected' : null }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        {!! Form::label('name', 'Category Name') !!}
                        {!! Form::text('name', $item->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('headline', 'Category Headline') !!}
                        {!! Form::text('headline', $item->headline, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Category Description') !!}
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
@stop

@section('scripts')
    <script>
        passValueToHidden($('.category-grid a'), 'grid', $('input[name="grid"]'), 'inactive', 'active');
        passValueToHidden($('.on_white a'), 'grid', $('input[name="on_white"]'), 'btn-default', 'btn-primary');
    </script>
@stop