<div class="banner @yield('banner')" style="background:url(@yield('background'))">
    @if(URL::current() == URL::to('/'))
        <ul class="slider">
            <li style="background:url({{ URL::asset('library/img/slider-mocha.jpg') }}); background-size:cover;">
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