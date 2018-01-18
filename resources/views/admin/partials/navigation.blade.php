<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="{{ isActive('admin/slides') }}">
            <a href="{{ URL::to('admin/slides') }}"><i class="fa fa-fw fa-flag"></i> Homepage Banners</a>
        </li>
        <li class="{{ isActive('admin/callouts') }}">
            <a href="{{ URL::to('admin/callouts') }}"><i class="fa fa-fw fa-asterisk"></i> Homepage Callouts</a>
        </li>
        <li class="{{ isActive('admin/cafes') }}">
            <a href="{{ URL::to('admin/cafes') }}"><i class="fa fa-fw fa-coffee"></i> Cafe Locations</a>
        </li>
        <li class="{{ isActive('admin/menu') }}">
            <a href="{{ URL::to('admin/menu') }}"><i class="fa fa-fw fa-cutlery"></i> Menu</a>
        </li>
        {{--<li class="{{ isActive('admin/blog') }}">--}}
            {{--<a href="{{ URL::to('admin/blog') }}"><i class="fa fa-fw fa-comment"></i> Cookie Talk Blog</a>--}}
        {{--</li>--}}
        <li class="{{ isActive('admin/promotions') }}">
            <a href="{{ URL::to('admin/promotions') }}"><i class="fa fa-star" aria-hidden="true"></i> Promotions</a>
        </li>
        <li class="{{ isActive('admin/admins') }}">
            <a href="{{ URL::to('admin/admins') }}"><i class="fa fa-fw fa-group"></i> Admins</a>
        </li>
    </ul>
</div>