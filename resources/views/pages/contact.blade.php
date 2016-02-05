@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Contact Us" !!}
@stop


@section('content')
    <section class="page">
        <div class="block header">
            <h2>
                Please contact us via the form below. We look forward to serving you. If you'd like to contact a store directly, go to the Nestlé Toll House Café by Chip <a href="{{ URL::to('locations') }}">store locator</a>.
            </h2>
            <hr class="red-dotted-divider within">
            <br>

        </div>
        <div class="clearfix"></div>
    </section>
@stop

@section('scripts')
    <script>
        $('form').on('submit', function(e){
            e.preventDefault();
            var that = $(this);
            var url = that.attr('action');
            $.ajax({
                type: 'post',
                url: url,
                data: that.serialize(),
                success: function (response) {
                    if(response == 'success') {
                        window.location.replace('{{ URL::to('contact/success') }}');
                    } else {
                        $('.alert').text('Please fill out all the required fields');
                        $('.alert').removeClass('hidden');
                    }
                }
            });
        });
    </script>
@stop