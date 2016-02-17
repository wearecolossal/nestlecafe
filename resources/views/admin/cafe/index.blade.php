@extends('layouts.admin')

@section('page-header', 'Cafe Administration')

@section('content')
    <div class="col-md-12">
        <a href="{{ URL::to('admin/cafes/create') }}" class="btn btn-primary pull-left {{ isActive('admin/cafes/archives') ? 'hidden' : null }}"><i class="glyphicon glyphicon-plus"></i>
            Add Cafe</a>
        <a href="{{ isActive('admin/cafes') ? URL::to('admin/cafes/archives') : URL::to('admin/cafes') }}" class="btn btn-default pull-right">{!! isActive('admin/cafes/archives') ? 'Active Caf&eacute;s' : 'Archived Caf&eacute;s' !!}</a>
        <div class="clearfix"></div>
        <br><br>
    </div>
    <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="active">
                        <th style="width:95px">Store #</th>
                        <th>Name</th>
                        <th>Services</th>
                        <th>City, State, Country</th>
                        <th class="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cafes as $cafe)
                        <tr class="{{ !$cafe->image ? 'danger' : null }}">
                            <td>#{{ sprintf('%04d', $cafe->store_number) }}</td>
                            <td>{{ $cafe->name }} {!! !$cafe->image ? '<small class="text-danger"><em>No Image</em></small>' : null !!}</td>
                            <td>
                        <span class="{{ $cafe->bakery != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-bakery.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->coffee != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-coffee.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->cookie != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-cookie.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->curbside != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-curbside.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->frozenyogurt != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-frozenyogurt.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->icecream != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-icecream.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->savory != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-savory.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->smoothies != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-smoothies.png') }}" width="20" alt=""></span>
                        <span class="{{ $cafe->wifi != 1 ? 'hidden' : null }}"><img
                                    src="{{ URL::asset('library/img/loc-wifi.png') }}" width="20" alt=""></span>
                                {!! cafeHasNoServices($cafe->id) !!}
                            </td>
                            <td>{{ $cafe->city.', '.$cafe->state.' '.$cafe->country }}</td>
                            <td class="actions">
                                <a href="{{ URL::to('admin/cafes/'.$cafe->id.'/edit') }}" class="btn btn-default btn-xs"><i
                                            class="glyphicon glyphicon-edit"></i></a>
                                <a data-toggle="modal" data-target="#{{ isActive('admin/cafes') ? 'archive' : 'activate' }}"
                                   data-url="{{ URL::to('admin/cafes/'.$cafe->id.'/archive') }}"
                                   class="btn btn-default btn-xs archive"><i class="glyphicon glyphicon-{{ isActive('admin/cafes') ? 'trash' : 'ok' }} {{ isActive('admin/cafes') ? 'text-danger' : 'text-success' }}"></i></a>
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
                    <h4 class="modal-title" id="myModalLabel">Archive Caf&eacute;?</h4>
                </div>
                <div class="modal-body">
                    Archived caf&eacute;s will be hidden from users and removed from this list of active caf&eacute;s.
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
                    <h4 class="modal-title" id="myModalLabel">Activate Caf&eacute;?</h4>
                </div>
                <div class="modal-body bg-success">
                    This caf&eacute; will be shown to users and added to this list of active caf&eacute;s.
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
        //Archive
        $('a.archive').on('click', function () {
            var modalTarget = $(this).data('target');
            var url = $(this).data('url');
            $(modalTarget).find('a.submit').attr('href', url);
        });
    </script>
@stop