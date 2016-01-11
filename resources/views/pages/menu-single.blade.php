@extends('layouts.master')

@section('banner', 'page')
@section('background', URL::asset('library/img/banner-menu.jpg'))
@section('bannerText')
    {!! "Life's<br>Simple<br>Pleasures" !!}
@stop

@section('content')
    <div class="red-dotted-divider float-up"></div>

    <div class="side columns">
        <ul>
            <li class="mobile-current"><a>{!! $category->name !!}</a></li>
            @foreach(\App\MenuCategory::orderby('order', 'asc')->get() as $menuNav)
            <li class="{{ isActive('menu/'.$menuNav->url) }}"><a {!! URL::current() == URL::to('menu/'.$menuNav->url) ? null : 'href="'.URL::to('menu/'.$menuNav->url).'"' !!}>{{ $menuNav->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="main columns">
        <div class="menu-page">
            <h1>{{ $category->headline }}</h1>

            <p class="lead">
                {!! $category->description !!}
            </p>

            <div class="clearfix"></div>
            <?php $iterator = 0; ?>
            @foreach($items as $item)
                <?php $iterator++; ?>
                <div class="menu-section">
                    <h2>{!! $item->name !!}</h2>
                    <p>
                        {!! $item->description !!}
                    </p>
                </div>
                {!! $iterator % 2 == 0 ? '<div class="clearfix"></div>' : null !!}
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="clearfix"></div>

@stop

@section('scripts')
@stop