<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="{{ isActive('admin') }}">
            <a href="{{ URL::to('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a data-url="{{ URL::to('admin/menu') }}" style="opacity:.2"><i class="fa fa-fw fa-cutlery"></i> Menu <small>pending</small></a>
        </li>
        <li>
            <a href="{{ URL::to('admin/cafes') }}"><i class="fa fa-fw fa-coffee"></i> Cafes</a>
        </li>
    </ul>
</div>