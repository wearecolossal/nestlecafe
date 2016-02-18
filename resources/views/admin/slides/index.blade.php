@extends('layouts.admin')

@section('page-header', 'Promo Banner Administration')

@section('content')
    <div class="col-md-2"><a href="{{ URL::to('admin/slides/create') }}" class="btn btn-primary pull-left {{ isActive('admin/slides/archives') ? 'hidden' : null }}"><i class="glyphicon glyphicon-plus"></i>
            Add Slide</a></div>
    <div class="col-md-8 searchbar">
        <input type="text" id="search" name="search" class="form-control" placeholder="Enter text to filter list">
        <div class="search-response" style="height:25px;width:100%;display:block;"><span class="text-success"></span></div>
    </div>
    <div class="col-md-2 text-right"> <a href="{{ isActive('admin/slides') ? URL::to('admin/slides/archives') : URL::to('admin/slides') }}" class="btn btn-default pull-right">{!! isActive('admin/slides/archives') ? 'Active Slides' : 'Archived Slides' !!}</a></div>
    <div class="row">
        <div class="clearfix"></div>
        <br><br>
        <div class="clearfix"></div>
            <div class="col-md-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="active">
                        <th style="width:95px">ID</th>
                        <th width="100">Image</th>
                        <th>Name</th>
                        <th class="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($slides as $slide)
                            <tr class="{{ $slide->draft == 1 ? 'warning text-warning' : null }}">
                                <td>#{{ sprintf("%03d", $slide->order) }}</td>
                                <td style="padding:0;"><img src="{{ URL::asset('uploads/slideshow/'.$slide->image) }}" width="100%" alt=""></td>
                                <td>
                                    <small>{{ strip_tags($slide->heading_small) }}</small>
                                    <br>
                                    {{ strip_tags($slide->heading_large) }}
                                    {!! $slide->draft == 1 ? '<br/><em>(draft)</em>' : null !!}
                                </td>
                                <td class="actions">
                                    <a href="{{ URL::to('admin/slides/'.$slide->id.'/edit') }}" class="btn btn-default btn-xs"><i
                                                class="glyphicon glyphicon-edit"></i></a>
                                    <a data-toggle="modal" data-target="#{{ isActive('admin/slides') ? 'archive' : 'activate' }}"
                                       data-url="{{ URL::to('admin/slides/'.$slide->id.'/archive') }}"
                                       class="btn btn-default btn-xs archive"><i class="glyphicon glyphicon-{{ isActive('admin/slides') ? 'trash' : 'ok' }} {{ isActive('admin/slides') ? 'text-danger' : 'text-success' }}"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="archive" tabindex="-1" role="dialog" aria-labelledby="archive">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Archive Slide?</h4>
                </div>
                <div class="modal-body">
                    Archived slides will be hidden from users.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger submit">Archive</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="activate" tabindex="-1" role="dialog" aria-labelledby="activate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Activate Slide?</h4>
                </div>
                <div class="modal-body bg-success">
                    This slide will be shown to users.
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