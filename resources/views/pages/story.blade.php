@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Our Story" !!}
@stop

@section('wrapper', 'full no-padding')

@section('content')

    <section class="page">
        <div class="block header">
            <h2>At The Heart Of Our Business, <br> Is A Vision To Enrich The Lives Of Others <br> And Serve Up The Ultimate Dessert Experience.</h2>
            <hr class="red-dotted-divider within">
        </div>
        <div class="block transparent">
            <h2 class="text-center">It's About The Relationship</h2>
            <div class="clearfix"></div>
            <div class="container compressed">
                <p>
                    It's not by chance that Nestl&eacute;&reg; Toll House&reg; Cafe by Chip&reg; continues to grow and have a phenomenal loyal consumer base. Like any good relationship, it seems the real secret to success is the ability to deliver a certain energy or vibe and uncommon creations that keep our consumers coming back for more.
                    <br> <br>
                    Our brand touches over 60 million customers per year. Primarily families, the customers experience fresh-baked Nestl&eacute;&reg; confections prepared by passionate team members.
                    <br> <br>
                    We believe unleashing the people and their passion for our brand in an inspired way, while staying focused on a purpose they can believe in, is an unstoppable force in the marketplace.

                </p>
            </div>
        </div>
    </section>
    <div class="section image" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/section-support.jpg') }}" style="background-position-y: bottom !important;height:400px;">
        <div class="container">
            <div class="content">
                <h1 style="margin-top:0;padding-top:0;">Support</h1>
                <p style="font-size:1em;width:80%;margin:0 auto;">
                    Franchisees are provided with support during the construction process, training, and planning a smashing grand opening.
                    <br> <br>
                    Ongoing support includes operations training, marketing, business coaching, assistance with staffing and others in the field business services. Our consultants provide insight into the business' sales and profitability and offer suggestions and alternatives to both reduce costs and drive top line sales.
                    <br><br>
                </p>
                <a href="{{ URL::to('franchise') }}" class="btn wired long">Learn About Our Franchising Opportunities</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <section class="page">
        <div class="container">
            <div class="block transparent">
                <h2 class="text-center">Awards</h2>
                <p class="lead text-center" style="margin:0;">
                    Our path to success has been marked with many honorable industry awards.
                </p>
                <hr class="red-dotted-divider within">
                <h3 style="margin-bottom:0;">Entrepreneur Magazine Franchise 500</h3>
                <p class="lead" style="margin:0 0 25px 0;">Ranked 11 years and Ranked #1 in Category two consecutive years.</p>
                <ul class="awards-list">
                    <li>
                        <div class="content">
                            <strong>2017</strong>
                            <p>Ranked 329</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2015</strong>
                            <p>Ranked 277</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2014</strong>
                            <p>Ranked 262</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2013</strong>
                            <p>Ranked 249</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2012</strong>
                            <p>Ranked 460</p>
                        </div>
                    </li>
                    <li class="first-class">
                        <div class="content">
                            <strong>2010</strong>
                            <p>Ranked 233</p>
                        </div>
                    </li>
                    <li class="first-class">
                        <div class="content">
                            <strong>2009</strong>
                            <p>Ranked 232</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2008</strong>
                            <p>Ranked 213</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2007</strong>
                            <p>Ranked 273</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2006</strong>
                            <p>Ranked 267</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2005</strong>
                            <p>Ranked 424</p>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <hr class="red-dotted-divider within">
                <h3 style="margin-bottom:0;">Entrepreneur America's Top Global Ranking</h3>
                <ul class="awards-list">
                    <li>
                        <div class="content">
                            <strong>2016</strong>
                            <p>Ranked 81</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2015</strong>
                            <p>Ranked 93</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2014</strong>
                            <p>Ranked 78</p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <strong>2013</strong>
                            <p>Ranked 144</p>
                        </div>
                    </li>

                </ul>
                <div class="clearfix"></div>
                <hr class="red-dotted-divider within">
                <h3 style="margin-bottom:0;">Restaurant Business Magazine Honors</h3>
                <ul class="awards-list">
                    <li class="enlarged">
                        <div class="content">
                            <strong>2009</strong>
                            <p style="margin:-5px 0 0 0;">The Future 50 <br><small>Fastest-Growing Emerging <br> Chains in America</small></p>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <hr class="red-dotted-divider within">
                <h3 style="margin-bottom:0;">Franchise Times</h3>
                <ul class="awards-list">
                    <li class="enlarged">
                        <div class="content">
                            <strong>2006</strong>
                            <p style="margin:-5px 0 0 0;">Fast 55<br><small>Fastest Growing Franchise <br> in America</small></p>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div class="section yellow" style="margin-bottom:-50px;">
        <h1>Explore The Possibilities</small></h1>
        <div class="container compressed">
            <p>
                What began with the Toll House&reg; chocolate chip cookie has grown into a dessert concept that knows no bounds. But what is it about this cookie that captivates us so much?
                <br><br>
                Glimpsed on a busy street or nibbling and sharing, Nestl&eacute;&reg; Toll House&reg; cookies make hearts beat faster, bring back a flood of memories, and dare the consumer to explore the possibilities our cafes have to offer.<br><br>
                For us dessert created with a passion for life and endless imagination is more than a sweet temptation - it's a state of mind, an intriguing place, an experience that can take you on a journey.
            </p>
            <p class="text-center">
                <a href="{{ URL::to('menu') }}" class="btn btn-red">Learn About Our Menu Items</a>
            </p>
        </div>
        <div class="clearfix"></div>
        <br>
    </div>
@stop

@section('scripts')
@stop