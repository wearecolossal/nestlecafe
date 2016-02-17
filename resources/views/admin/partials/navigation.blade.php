<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="{{ isActive('admin/cafes') }}">
            <a href="{{ URL::to('admin/cafes') }}"><i class="fa fa-fw fa-coffee"></i> Cafes</a>
        </li>
        <li class="{{ isActive('admin/menu') }}">
            <a data-url="{{ URL::to('admin/menu') }}" style="opacity:.2"><i class="fa fa-fw fa-cutlery"></i> Menu <small>pending</small></a>
        </li>
        <li class="{{ isActive('admin/admins') }}">
            <a href="{{ URL::to('admin/admins') }}"><i class="fa fa-fw fa-group"></i> Admins</a>
        </li>
    </ul>
</div>