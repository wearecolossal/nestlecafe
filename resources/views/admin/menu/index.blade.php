@extends('layouts.admin')

@section('page-header', 'Menu Administration')

@section('content')
    <div class="col-md-6">
        <h3 class="page-header">Menu Categories <a href="{{ URL::to('admin/menu/categories/create') }}" class="btn btn-default pull-right"><i class="glyphicon glyphicon-plus"></i> Create Menu Category</a></h3>
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
                    <tr>
                        <td width="100">
                            @if($category->image)
                                <img src="{{ URL::asset('uploads/menu_list/'.$category->image) }}" width="100" alt="">
                            @else
                                <div style="background:#f2f2f2;border:1px solid #ccc; width:100px;height:75px;display:flex;align-items: center;justify-content:center;">No Image</div>
                            @endif
                        </td>
                        <td>{{ $category->name }}</td>
                        <td class="actions"><a href="{{ URL::to('admin/menu/categories/'.$category->id.'/edit') }}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>

    </div>
    <div class="col-md-6">
        <h3 class="page-header">Menu Items <a href="{{ URL::to('admin/menu/create') }}" class="btn btn-default pull-right"><i class="glyphicon glyphicon-plus"></i> Create Menu Item</a></h3>
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
                    <tr>
                        <td>
                            @if($item->image)
                                <img src="{{ URL::asset('uploads/menu_items/'.$item->image) }}" width="100" alt="">
                            @else
                                <div style="background:#f2f2f2;border:1px solid #ccc; width:100px;height:75px;display:flex;align-items: center;justify-content:center;">No Image</div>
                            @endif
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ \App\MenuCategory::find($item->category)->name }}</td>
                        <td class="actions">
                            <a href="{{ URL::to('admin/menu/'.$item->id.'/edit') }}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
@stop