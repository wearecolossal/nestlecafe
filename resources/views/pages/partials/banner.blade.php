<div class="banner @yield('banner')" style="background: url(@yield('background'))">
    @if(URL::current() == URL::to('/'))
        <ul class="slider">
            @if(isset($slides))
                @foreach($slides as $slide)
                    <li style="background:#F1F295 url({{ URL::asset('uploads/slideshow/'.$slide->image) }});" class="{{ $slide->right_align ? 'right-align' : null }} {{ $slide->on_white ? 'on-white' : null }}">
                        <div class="content">
                            <h2 class="subhead">{!! $slide->heading_small !!}</h2>
                            <h1 class="heading">{!! $slide->heading_large !!}</h1>
                            <p class="tag">{!! $slide->heading_sub !!}</p>
                        </div>
                        @if($slide->link)
                            <a href="{{ $slide->link }}" target="_blank" class="slide-link">{{ $slide->link }}</a>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    @else
        <div class="banner-wrapper">
            <div class="container">
                <p>@yield('bannerText')</p>
            </div>
        </div>
    @endif
</div>