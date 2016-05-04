@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Caf&eacute; By Chip<sup>&reg;</sup> Club" !!}
@stop

@section('content')
    <section class="page">
        <div class="block header">
            <h2>Become A Member Of The <br> <span style="font-size:2.10em;">Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Caf&eacute; By Chip<sup>&reg;</sup> Club!</span></h2>
        </div>
        <div class="block dark">
            <h2 class="text-center">
                Receive sneak peeks of new products and upcoming promotions. <br />Get special invitations to Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Caf&eacute; By Chip<sup>&reg;</sup> Club exclusive events and <br />a birthday gift to celebrate your special day!
            </h2>
        </div>
        <div class="block light no-border">
                <iframe src="https://ohio2.franconnect.net/nestlecafezcubator/contactIframe.jsp" height="1000" width="100%" frameborder="0"></iframe>
        </div>
    </section>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function(){
                $('input[name="address_0emailIds"]').val('tarun@tarunkrishnan.com');
            }, 3000);
        });
    </script>
@stop