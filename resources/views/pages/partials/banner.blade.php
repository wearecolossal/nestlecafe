<div class="banner @yield('banner')" style="background: @yield('hex') url(@yield('background'))">
    @if(URL::current() == URL::to('/'))
        <ul class="slider">
            <li style="background:#F1F295 url({{ URL::asset('uploads/slideshow/slider-mocha-vin.jpg') }}); background-size:cover;">
                <div class="content">
                    <h2 class="subhead">Chill With Our Favorites</h2>
                    <h1 class="heading">Mocha <br> Frappes</h1>
                    <p class="tag">Toll House&reg; Cookie <br> Turtle <br> Nestl&eacute; Crunch <br> Butterfinger</p>
                </div>
            </li>
        </ul>
    @else
        <div class="banner-wrapper">
            <div class="container">
                <p>@yield('bannerText')</p>
            </div>
        </div>
    @endif
</div>