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
            {!! Form::open(['route'=> ['admin.slides.update', $slide->id], 'class' => 'slide', 'files' => true]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('image', 'Slide Image') !!}
                    @if($slide->image)
                        <img src="{{ URL::asset('uploads/slideshow/'.$slide->image) }}" width="100%" alt="">
                    @endif
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    <small>Please update a .jpg or .png image that is <strong>1200 x 600 pixels</strong> in dimension</small>
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('heading_small', 'Small Headline') !!}
                    {!! Form::text('heading_small', $slide->heading_small, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('heading_large', 'Main Headline') !!}
                    {!! Form::text('heading_large', $slide->heading_large, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('heading_sub', 'Sub Headline') !!}
                    {!! Form::text('heading_sub', $slide->heading_sub, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('on_white', 'Is The Text On A Light Image?') !!} <br>
                    <div class="btn-group">
                        <a data-value="1" data-show="headline-fields" data-active-class="btn-primary" class="btn btn-default {{ $slide->on_white == 1 ? 'btn-primary' : null }}">Yes</a>
                        <a data-value="0" data-show="headline-fields" data-active-class="btn-primary" class="btn btn-default {{ $slide->on_white == 0 && $slide->no_headline == 0 ? 'btn-primary' : null }}">No</a>
                        <a data-value="0" data-hide="headline-fields" data-active-class="btn-primary" class="btn btn-default {{ $slide->no_headline == 1 ? 'btn-primary' : null }}">No Headline</a>
                        {!! Form::hidden('on_white', $slide->on_white) !!}
                    </div>
                </div>
                <div class="form-group heading-fields">
                    {!! Form::label('right_align', 'Make Text Right Aligned?') !!} <br>
                    <div class="btn-group">
                        <a data-value="1" data-active-class="btn-primary" class="btn btn-default {{ $slide->right_align == 1 ? 'btn-primary' : null }}">Yes</a>
                        <a data-value="0" data-active-class="btn-primary" class="btn btn-default {{ $slide->right_align == 0 ? 'btn-primary' : null }}">No</a>
                        {!! Form::hidden('right_align', $slide->right_align) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('order', 'Order') !!}
                    <select name="order" id="order" class="form-control">
                        @for($i = 0; $i <= 100; $i++)
                            <option value="{{ $i }}" {{ $slide->order == $i ? 'selected' : null }}>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="panel-footer text-center">
                <input type="submit" value="Update" class="btn {{ $slide->draft == 1 ? 'btn-default' : 'btn-primary' }}">
                <a class="save-as-draft btn btn-default {{ $slide->draft == 1 ? 'btn-success' : null }}">{{ $slide->draft == 1 ? 'Make Slide Active' : 'Save As Draft' }}</a>
                <a href="{{ URL::to('admin/slides') }}" class="btn btn-danger">Exit and Do Not Save</a>
                {!! Form::hidden('draft', $slide->draft) !!}
                {!! Form::hidden('no_headline', $slide->no_heading) !!}
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
        @if($slide->no_headline == 1)
        $('.heading-fields').hide();
        @endif
    </script>
@stop