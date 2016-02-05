<div class="banner @yield('banner')" style="background: url(@yield('background'))">
    @if(URL::current() == URL::to('/'))
        <ul class="slider">
            <li style="background:#871303 url({{ URL::asset('uploads/slideshow/slider-valentine.jpg') }});">
                <div class="content">
                    <h2 class="subhead">This Gift</h2>
                    <h1 class="heading">Takes <br> The Cake</h1>
                    <p class="tag" style="color:#fff;">Order Your <br>Special Valentine's <br>Day Cookie Cake Today</p>
                </div>
            </li>
            <li style="background:#F1F295 url({{ URL::asset('uploads/slideshow/slider-mocha.jpg') }});">
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