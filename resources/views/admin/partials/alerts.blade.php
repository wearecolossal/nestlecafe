@if(Session::get('success'))
    <div class="alert alert-success fade-away">{{ Session::get('success') }}</div>
@endif
@if(Session::get('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif