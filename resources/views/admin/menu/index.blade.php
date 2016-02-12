@extends('layouts.admin')

@section('page-header', 'Menu Administration')

@section('content')
    <div class="col-md-12">
        <h3 class="page-header">Menu Categories</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ URL::to('admin/menu/categories/'.$category->id.'/edit') }}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <h3 class="page-header">Menu Items</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Action</th>
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
                        <td>
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