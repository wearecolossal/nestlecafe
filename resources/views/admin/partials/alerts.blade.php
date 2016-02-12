@if(Session::get('success'))
    <div class="alert alert-success">This is a test</div>
@endif
@if(Session::get('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif