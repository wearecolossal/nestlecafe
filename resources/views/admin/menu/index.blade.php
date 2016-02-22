@extends('layouts.admin')

@section('page-header', isActive('admin/menu/archives') ? 'Menu Administration (Archives)' : "Menu Administration")

@section('content')
    <div class="col-md-12">
        @include('admin.partials.alerts')
    </div>
    <div class="col-md-12">
        <a href="{{ isActive('admin/menu') ? URL::to('admin/menu/archives') : URL::to('admin/menu') }}" class="btn btn-default pull-right">{!! isActive('admin/menu/archives') ? 'View Active Menu Items & Categories' : 'View Archived Menu Items & Categories' !!}</a>
        <div class="clearfix"></div>
        <hr>
    </div>
    <div class="col-md-6">
        <h3 class="page-header">Menu Categories <a href="{{ URL::to('admin/menu/categories/create') }}" class="btn btn-default pull-right {{ isActive('admin/menu/archives') ? 'hidden' : null }}"><i class="glyphicon glyphicon-plus"></i> Create Menu Category</a><div class="clearfix"></div></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="active">
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th class="actions">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="{{ $category->draft == 1 ? 'warning text-warning' : null }}">
                        <td width="100">
                            @if($category->image)
                                <img src="{{ URL::asset('uploads/menu_list/'.$category->image) }}" width="100" alt="">
                            @else
                                <div style="background:#f2f2f2;border:1px solid #ccc; width:100px;height:75px;display:flex;align-items: center;justify-content:center;">No Image</div>
                            @endif
                        </td>
                        <td>{{ $category->name }}  {!! $category->draft == 1 ? '<em>(Draft)</em>': null !!}</td>
                        <td class="actions">
                            <a href="{{ URL::to('admin/menu/categories/'.$category->id.'/edit') }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-toggle="modal" data-target="#{{ isActive('admin/menu') ? 'archiveMenuCategory' : 'activateMenuCategory' }}"
                               data-url="{{ URL::to('admin/menu/categories/'.$category->id.'/archive') }}"
                               class="btn btn-default btn-xs archive"><i class="glyphicon glyphicon-{{ isActive('admin/menu') ? 'trash' : 'ok' }} {{ isActive('admin/menu') ? 'text-danger' : 'text-success' }}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>

    </div>
    <div class="col-md-6">
        <h3 class="page-header">Menu Items <a href="{{ URL::to('admin/menu/create') }}" class="btn btn-default pull-right {{ isActive('admin/menu/archives') ? 'hidden' : null }}"><i class="glyphicon glyphicon-plus"></i> Create Menu Item</a><div class="clearfix"></div></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr class="active">
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th class="actions">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="{{ $item->draft == 1 ? 'warning text-warning' : null }}">
                        <td>
                            @if($item->image)
                                <img src="{{ URL::asset('uploads/menu_items/'.$item->image) }}" width="100" alt="">
                            @else
                                <div style="background:#f2f2f2;border:1px solid #ccc; width:100px;height:75px;display:flex;align-items: center;justify-content:center;">No Image</div>
                            @endif
                        </td>
                        <td>{{ $item->name }} {!! $item->draft == 1 ? '<em>(Draft)</em>': null !!}</td>
                        <td>{{ \App\MenuCategory::find($item->category)->name }}</td>
                        <td class="actions">
                            <a href="{{ URL::to('admin/menu/'.$item->id.'/edit') }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-toggle="modal" data-target="#{{ isActive('admin/menu') ? 'archiveMenuItem' : 'activateMenuItem' }}"
                               data-url="{{ URL::to('admin/menu/'.$item->id.'/archive') }}"
                               class="btn btn-default btn-xs archive"><i class="glyphicon glyphicon-{{ isActive('admin/menu') ? 'trash' : 'ok' }} {{ isActive('admin/menu') ? 'text-danger' : 'text-success' }}"></i></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="archiveMenuItem" tabindex="-1" role="dialog" aria-labelledby="archive">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Archive Menu Item?</h4>
                </div>
                <div class="modal-body">
                    Archived Menu Categories will be hidden from users.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger submit">Archive</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="activateMenuItem" tabindex="-1" role="dialog" aria-labelledby="activate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Activate Menu Item?</h4>
                </div>
                <div class="modal-body bg-success">
                    This Menu Category will be shown to users.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-success submit">Activate</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="archiveMenuCategory" tabindex="-1" role="dialog" aria-labelledby="archive">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Archive Menu Category?</h4>
                </div>
                <div class="modal-body">
                    Archived Menu Items will be hidden from users.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger submit">Archive</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="activateMenuCategory" tabindex="-1" role="dialog" aria-labelledby="activate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Activate Menu Category?</h4>
                </div>
                <div class="modal-body bg-success">
                    This Menu Item will be shown to users.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-success submit">Activate</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        applyArchiveLink($('a.archive'));
    </script>
@stop