@include('layouts.partials.header')

@include('layouts.partials.navigation')

@include('pages.partials.banner')

<div class="dotted red {{ URL::current() == URL::to('/') ? 'hidden' : null }}"></div>
<div class="wrapper {{ URL::current() == URL::to('/') ? 'home' : null }} @yield('wrapper')">
    @yield('content')
</div>

@include('layouts.partials.footer')
