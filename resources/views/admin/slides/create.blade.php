@extends('layouts.admin')

@section('page-header', 'Edit Slide <a href="'.URL::to('admin/slides').'" class="btn btn-default pull-right"><i class="glyphicon glyphicon-chevron-left"></i> Back To Slides</a>')


@section('content')
    <div class="col-md-8 col-md-offset-2">
        @if(Session::get('success'))
            <div class="alert alert-success fade-away">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="panel panel-default">
            {!! Form::open(['route'=> 'admin.slides.store', 'class' => 'slide', 'files' => true]) !!}
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('image', 'Slide Image') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    <small>Please update a .jpg or .png image that is <strong>1200 x 600 pixels</strong> in dimension
                    </small>
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('heading_small', 'Small Headline') !!}
                    {!! Form::text('heading_small', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('heading_large', 'Main Headline') !!}
                    {!! Form::text('heading_large', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('heading_sub', 'Sub Headline') !!}
                    {!! Form::text('heading_sub', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('link', 'Link') !!} <br>
                    <small>Please paste the entire URL, including the <em>http://</em>.</small>
                    {!! Form::text('link', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('on_white', 'Is The Text On A Light Image?') !!} <br>

                    <div class="btn-group">
                        <a data-value="1" data-show="heading-fields" data-active-class="btn-primary"
                           class="btn btn-default">Yes</a>
                        <a data-value="0" data-show="heading-fields" data-active-class="btn-primary"
                           class="btn btn-default btn-primary">No</a>
                        <a data-value="0" data-hide="heading-fields" data-active-class="btn-primary"
                           class="btn btn-default no-headline">No Headline</a>
                        {!! Form::hidden('on_white', 0) !!}
                    </div>
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('right_align', 'Make Text Right Aligned?') !!} <br>

                    <div class="btn-group">
                        <a data-value="1" data-active-class="btn-primary" class="btn btn-default">Yes</a>
                        <a data-value="0" data-active-class="btn-primary" class="btn btn-default btn-primary">No</a>
                        {!! Form::hidden('right_align', 0) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('order', 'Order') !!}
                    <select name="order" id="order" class="form-control">
                        @for($i = 0; $i <= 100; $i++)
                            <option value="{{ $i }}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="panel-footer text-center">
                <input type="submit" value="Update" class="btn btn-primary">
                <a class="save-as-draft btn btn-default">Save As Draft</a>
                <a href="{{ URL::to('admin/slides') }}" class="btn btn-danger">Exit and Do Not Save</a>
                {!! Form::hidden('draft', 0) !!}
                {!! Form::hidden('no_headline', 0) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
    <script>
        draft($('a.save-as-draft'), $('form.slide'));
        applyValToHidden($('.btn-group a'));
        $('.btn-group a').on('click', function () {
            var showClass = $(this).data('show');
            var hideClass = $(this).data('hide');
            $('.' + showClass).fadeIn(500);
            $('.' + hideClass).fadeOut(500);
            if($(this).hasClass('no-headline')) {
                $('input[name="no_headline"]').val(1);
            } else {
                $('input[name="no_headline"]').val(0);
            }
        });
    </script>
@stop