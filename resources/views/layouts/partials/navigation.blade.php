<nav class="navigation">
    <div class="container">
        <a href="{{ URL::to('/') }}" class="logo"><img src="{{ URL::asset('library/img/logo.png') }}" alt=""></a>
        <ul class="navlist">
            <li><a class="{{ isActive('menu') }} dropdown" data-dropdown="#menu" href="{{ URL::to('menu') }}">Menu</a></li>
            <li><a class="{{ isActive('locations') }}" href="{{ URL::to('locations') }}">Caf&eacute; Locator</a></li>
            <li><a class="{{ isActive('story') }}" href="{{ URL::to('story') }}">Our Story</a></li>
            <li><a class="{{ isActive('franchise') }}" href="{{ URL::to('franchise') }}">Franchise</a></li>
        </ul>
        <a href="{{ URL::to('online-order') }}" class="order-online"><span>Online Order</span></a>
        <a class="mobile-show"><img src="{{ URL::asset('library/img/ico-menu.png') }}" height="30" alt=""></a>
    </div>
    <ul class="menulist dropdown" id="menu">
        @foreach(\App\MenuCategory::orderby('order', 'asc')->get() as $menuNav)
            <li><a href="{{ URL::to('menu/'.$menuNav->url) }}">{{ $menuNav->name }}</a></li>
        @endforeach
    </ul>
</nav>