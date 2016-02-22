@extends('layouts.admin')

@section('page-header', 'Create Menu Category <a href="'.URL::to('admin/menu').'" class="btn btn-default pull-right"><i class="glyphicon glyphicon-chevron-left"></i> Back To Menu</a>')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Menu Category
            </div>
            {!! Form::open(['files' => true, 'route' => 'admin.menu.categories.store']) !!}
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('list_order', 'Menu Page Order') !!}
                        <select name="list_order" id="list_order" class="form-control">
                            <option value="0">Hide</option>
                            @for($i = 1; $i <= 100; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('order', 'Menu Navigation Order') !!}
                        <select name="order" id="order" class="form-control">
                            @for($i = 0; $i <= 100; $i++)
                                <option value="{{ $i }}" >{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        {!! Form::label('name', 'Category Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('headline', 'Category Headline') !!}
                        {!! Form::text('headline', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Category Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    <small>Please upload a .jpg or .png image file that is <strong>627 × 320</strong> pixels in
                        dimension.
                    </small>
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="form-group category-grid">
                        {!! Form::label('grid', 'Layout') !!}
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-xs-8"><a data-grid="2" class="active">Wide
                                    Column</a></div>
                            <div class="col-xs-4"><a data-grid="1" class="">Narrow
                                    Column</a></div>
                        </div>
                        <div class="clearfix"></div>
                        {!! Form::hidden('grid', 2) !!}
                        <hr>
                    </div>
                    <div class="form-group">
                        {!! Form::label('on_white', 'Text Style') !!}
                        <small>For the menu page</small>
                        <br>

                        <div class="btn-group on_white">
                            <a data-white="0" class="btn btn-default btn-primary">Normal</a>
                            <a data-white="1" class="btn btn-default">On
                                White</a>
                        </div>
                        {!! Form::hidden('on_white', 0) !!}
                    </div>
                    <hr>
                </div>
                <div class="col-md-12">
                    {!! Form::file('banner', ['class' => 'form-control']) !!}
                    <small>Please upload a .jpg or .png image file that is <strong>1100 × 327</strong> pixels in
                        dimension.
                    </small>
                </div>


                <div class="col-md-12 text-center">
                    <br><br>
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