@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/bg-fundraise.png'))
@section('banner_style', 'background-size:contain !important;')
@section('bannerText')
    {!! "<span style=\"font-size:.85em\"><span style=\"color:#2E1A11\">Nestl&eacute;&reg; Toll House&reg; Caf&eacute; By Chip&reg; Fun</span><span style=\"color:#b91322\">raising</span></span>" !!}
@stop

@section('wrapper', 'full')

@section('content')
    <section class="page">
        <div class="container compressed">
            <div class="block header">
                <h2 style="text-align: left">Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg; is happy to help support local communities by providing your organization with some sweet fundraising opportunities. From special fundraising events in our caf&eacute;s to partnering with schools, we are here to help you raise some dough for your organization in a fun and delicious way!</h2>
            </div>
            <div class="block transparent">
                <div class="row">
                    <div class="fundraise-block">
                        <h3>COOKIE CAKE FUNDRAISER</h3>
                        <a style="cursor:pointer;">
                            <img src="{{ URL::asset('library/img/fundraise-001.png') }}" alt="">
                            <div class="data-text hidden">
                                <p>
                                    We are pleased to offer something new, exciting and easy to sell: Nestl&eacute;&reg; Toll House&reg; Recipe Cookie Cakes. There is no better way to celebrate an upcoming occasion than with a customized cookie cake. The fundraiser couldn’t be easier. Simply sell Cookie Cake voucher coupons to your customer, who can choose either a 15” cookie cake or two dozen cookies. The best part is the customer can redeem their voucher anytime they wish! All sales will help achieve your school or organization’s fundraising goals.
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="fundraise-block">
                        <h3>COOKIE COUPON BOOKS</h3>
                        <a style="cursor:pointer;">
                            <img src="{{ URL::asset('library/img/fundraise-discount.png') }}" alt="">
                            <div class="data-text hidden">
                                <p>The Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg; Discount Coupon Book is a great way to fundraise by selling coupons for our great-tasting products. You will receive the coupon books at no cost to you and your organization gets to keep all the sales! The Discount Coupon Book offers include:</p>
                                <ul>
                                    <li>Free regular cookie</li>
                                    <li>Free small coffee or hot chocolate</li>
                                    <li>Buy one regular cookie, get one free</li>
                                    <li>$2.00 off a cookie cake, 12” or larger</li>
                                    <li>Free smoothie or chiller, with gift card of $20 or more</li>
                                    <li>10% Off any cookie cake</li>
                                    <li>Free large soda, with purchase of 2 regular cookies</li>
                                    <li>Any large soda, only 50 cents</li>
                                    <li>Buy two brownies, get the 3rd free</li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fundraise-block">
                        <h3>CHIP IN NIGHT</h3>
                        <a style="cursor:pointer">
                            <img src="{{ URL::asset('library/img/fundraise-chip-in.png') }}" alt="">
                            <div class="data-text hidden">
                                <p>A Chip In Night is a fun, easy, and tasty way for your school or organization to raise some dough. Get the word out and invite everyone you know to enjoy some sweet treats at your local Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg; on a designated night. At the end of the night, we’ll give your school or organization 20% of all ticketed sales redeemed by your guests. Sounds like a win-win!</p>
                            </div>
                        </a>
                    </div>

                    <div class="fundraise-block">
                        <h3>COOKIE DOUGH PROGRAM</h3>
                        <a style="cursor:pointer">
                            <img src="{{ URL::asset('library/img/fundraise-cookie-dough.png') }}" alt="">

                            <div class="data-text hidden">
                                <p>
                                    Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg; Cookie Dough Program is
                                    designed to give elementary school teachers a creative way to help their students
                                    succeed--with delicious incentives that include cookie cakes and free cookies!
                                    Classes within each grade (K-5) compete against each other to win a Cookie Cake
                                    Party. Students earn Cookie Dough Dollars for good grades and good deeds determined
                                    by the teacher, and the class with the most in each grade receives a free Cookie
                                    Cake Party at the end of the semester!
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="block-transparent">
                <div class="text-center">
                    <p style="color:#fff;">As fundraising opportunities may vary by location, please contact your local Nestl&eacute;&reg; Toll House&reg; Caf&eacute; By Chip&reg; if you would like more information or would like to participate in one of our fundraising programs.</p>
                    <div class="clearfix"></div>
                    <br>
                    <a href="{{ URL::to('locations') }}" class="btn wired btn-yellow">Find Your Caf&eacute;</a>
                </div>
            </div>
        </div>
    </section>
<div class="clearfix"></div>
    <div class="popover">
        <div class="popover-wrapper">
            <div class="popover-heading">
                <a class="close btn wired btn-red btn-close">CLOSE</a>
            </div>
            <div class="popover-content">
                <div class="popover-image">
                    <img src="" alt="">
                </div>
                <div class="popover-text"></div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $('.fundraise-block a').on('click', function(){
            var text = $(this).find('.data-text').html();
            var headline = $(this).parent().find('h3').text();
            var image = $(this).find('img').attr('src');
            $('.popover-text').html('<h3>'+headline+'</h3>'+text);
            $('.popover-image img').attr('src',image);
           $('.popover').addClass('show');

        });
        $('.popover a.close').on('click', function(){
           $('.popover').removeClass('show');
        });
        $('.popover').on('click', function(e){
            if(e.target == this) {
                $('.popover').removeClass('show');
            }
        });
    </script>
@stop