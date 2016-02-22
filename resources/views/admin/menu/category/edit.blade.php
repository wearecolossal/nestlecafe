@extends('layouts.admin')

@section('page-header', 'Edit Menu Category <a href="'.URL::to('admin/menu').'" class="btn btn-default pull-right"><i class="glyphicon glyphicon-chevron-left"></i> Back To Menu</a>')

@section('content')
    <div class="col-md-12">
        @include('admin.partials.alerts')
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $item->name }}
            </div>
            {!! Form::open(['files' => true, 'route' => ['admin.menu.categories.update', $item->id], 'class' => 'category']) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            <div class="panel-body">
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
                        {!! Form::textarea('description', $item->description, ['class' => 'form-control', 'id' => 'description']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    @if($item->image)
                        <img src="{{ URL::asset('uploads/menu_list/'.$item->image) }}"
                             style="width:100%;max-width:intrinsic;" alt="">
                    @endif
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
                            <div class="col-xs-8"><a data-grid="2" class="{{ $item->grid == 2 ? 'active' : null }}">Wide
                                    Column</a></div>
                            <div class="col-xs-4"><a data-grid="1" class="{{ $item->grid == 1 ? 'active' : null }}">Narrow
                                    Column</a></div>
                        </div>
                        <div class="clearfix"></div>
                        {!! Form::hidden('grid', $item->grid) !!}
                        <hr>
                    </div>
                    <div class="form-group">
                        {!! Form::label('on_white', 'Text Style') !!}
                        <small>For the menu page</small>
                        <br>

                        <div class="btn-group on_white">
                            <a data-white="0" class="btn btn-default {{ $item->on_white == 0 ? 'btn-primary' : null }}">Normal</a>
                            <a data-white="1" class="btn btn-default {{ $item->on_white == 1 ? 'btn-primary' : null }}">On
                                White</a>
                        </div>
                        {!! Form::hidden('on_white', $item->on_white) !!}
                    </div>
                    <hr>
                </div>
                <div class="col-md-12">
                    @if($item->banner)
                        <img src="{{ URL::asset('uploads/menu_banners/'.$item->banner) }}"
                             style="width:100%;max-width:intrinsic;" alt="">
                    @endif
                    {!! Form::file('banner', ['class' => 'form-control']) !!}
                    <small>Please upload a .jpg or .png image file that is <strong>1100 × 327</strong> pixels in
                        dimension.
                    </small>
                </div>


                <div class="col-md-12 text-center">
                    <br><br>
                    <input type="submit" value="Update" class="btn btn-primary {!! $item->draft == 1 ? 'hidden' : null  !!}">
                    <a class="btn {{ $item->draft == 1 ? 'btn-success' : 'btn-default ' }} save-as-draft">{{ $item->draft == 0 ? 'Save As Draft' : 'Make Item Active' }}</a>
                    <a href="{{ URL::to('admin/menu') }}" class="btn btn-danger">Do Not Save & Cancel</a>
                    {!! Form::hidden('draft', $item->draft) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                (Preview) Category Placement in Menu Page <br>
                <small>To update, change the number in the <nobr><strong>"Menu Page Order"</strong> dropdown.</nobr></small>

            </div>
            <div class="panel-body">
                <div class="clearfix"></div>
                @foreach(\App\MenuCategory::whereNotNull('image')->where('list_order', '!=', 0)->where('archive', 0)->where('draft', 0)->orderby('list_order', 'asc')->get() as $category)
                <div class="{{ $category->grid == 1 ? 'col-md-5' : 'col-md-7' }}">
                    <div class="well" style="{{ $category->id == $item->id ? 'background:#2E1A11;color:#fff;' : null }}" ><small>{!! strlen($category->name) > 13 ? substr($category->name, 0, 12).'&hellip;' : $category->name !!}</small></div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        draft($('a.save-as-draft'), $('form.category'));
        passValueToHidden($('.category-grid a'), 'grid', $('input[name="grid"]'), 'inactive', 'active');
        passValueToHidden($('.on_white a'), 'grid', $('input[name="on_white"]'), 'btn-default', 'btn-primary');
    </script>
@stop