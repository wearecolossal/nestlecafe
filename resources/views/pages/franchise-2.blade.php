@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Franchising <br/> Opportunities" !!}
@stop

@section('wrapper', 'full')

@section('content')
<section class="page">
        <div class="container compressed">
            <div class="block header">
                <h2 style="font-size:2em;">Life Is Full Of Treats</h2>
            </div>
            <div class="block transparent">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam velit qui, voluptatum neque quis vel veniam vitae? Voluptatibus incidunt, architecto animi ipsa, iure, eum repellat ad sapiente nihil facere autem!
                    <br><br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe amet quos esse architecto ratione aperiam tenetur id eum in eos, provident, consequatur quod blanditiis aspernatur cumque ullam! Illum, cum, modi!
                </p>
            </div>
        </div>
    </section>
    <section class="page">
        <div class="block header">
            <h2 style="font-size:2em;">Lorem ipsum dolor sit amet</h2>
        </div>
    </section>
    <div class="section image franchise-1" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/banner-store-family.jpg') }}" style="background-position-y: bottom !important;min-height:500px;">
        <div class="container">
            <div class="content">
                {{-- <h1 style="margin-top:0;padding-top:0;margin-bottom:10px;">You Just Have To Know <br> Where To Find Them</h1> --}}
                <p style="font-size:1em;width:80%;margin:0 auto;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse architecto tempora soluta sunt illum consequatur, quasi quia facilis, ea aliquid veniam eum suscipit minima doloribus iure nam maxime, nostrum iste. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum numquam, ab provident quia magni ex suscipit molestias magnam unde fuga, a deleniti consectetur incidunt, nostrum sapiente. Qui reiciendis quis, dolores.
                    <br><br>
                </p>
                <a href="#" target="_blank" class="btn wired">Learn More</a>
            </div>
            <div class="row">
                    <div class="col-1"><img src="{{ URL::asset('library/img/franching-placedholder-sq-500.jpg') }}" alt=""></div>
                    <div class="col-3"><img src="{{ URL::asset('library/img/franching-placedholder-1500.jpg') }}" alt=""></div>
                </div>
        </div>
        <div class="clearfix"></div>
    </div>

    {{--  --}}

    <section class="page">
        <div class="block header">
            <h2 style="font-size:2em;">US and Canada are wide open</h2>
        </div>
    </section>
        <div class="section image franchise-2" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/franchise-map.jpg') }}" style="background-position-y: center !important;z-index: 9999">
        <div class="container">
            <div class="content" style="text-align: left;">
                <h1 style="margin-top:0;padding-top:0;margin-bottom:10px;text-align:left;">Lorem ipsum dolor sit amet</h1>
                <p style="font-size:1.2em;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse architecto tempora soluta sunt illum consequatur, quasi quia facilis, ea aliquid veniam eum suscipit minima doloribus iure nam maxime, nostrum iste. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum numquam, ab provident quia magni ex suscipit molestias magnam unde fuga, a deleniti consectetur incidunt, nostrum sapiente. Qui reiciendis quis, dolores.
                    <br><br>
                </p>
                <a href="#" target="_blank" class="btn wired">Learn More</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="section yellow franchise-3">
        <h1 class="standard">
            Focus on fun
        </h1>
        <div class="container" style="text-align:center; padding-bottom:90px;">
            <p style="font-size:1.25em;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero ab non quisquam quibusdam porro illum nisi provident reprehenderit, dolorem a doloremque dignissimos magni voluptas velit harum aut, amet ratione optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam laudantium modi numquam consectetur dolores, sint delectus ex optio facere tempore dicta atque. Magni quae, vero veritatis sunt, impedit nesciunt quaerat?</p>
            <a href="#" target="_blank" class="btn wired btn-red">Learn More</a>
        </div>
        <div class="container store-images">
            <div class="store-img">
                <img src="{{ URL::asset('library/img/franchise-store-img.jpg') }}" alt="">
            </div>
            <div class="store-img">
                <img src="{{ URL::asset('library/img/franchise-store-img-2.jpg') }}" alt="">
            </div>
            <div class="store-img">
                <img src="{{ URL::asset('library/img/franchise-store-img-3.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="section red franchise-4">
        <h1 class="standard">
            You Just Have To Know Where To Find Them
        </h1>
        <div class="container" style="text-align:center; padding-bottom:90px;">
            <p style="font-size:1.25em;">We invite you to explore the Nestlé® Toll House® Cafe® by Chip® franchise overview and engage in the subsequent learning and discovery steps of our highly compelling business opportunity. 
<br><br>
Please note, there are six (6) engaging questions for you to answer as you review our brochure. Once you are finished, you will have the opportunity to complete our online application. </p>
<a href="#" target="_blank" class="btn wired">Learn More</a>
    <h3>
        <small>or </small> <br>
        call us at (214) 495-9533
    </h3>
        </div>
    </div>
@stop

@section('scripts')
@stop