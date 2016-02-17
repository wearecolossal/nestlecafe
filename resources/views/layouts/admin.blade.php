@include('layouts.partials.admin.header')

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top admin-navbar" role="navigation">
       <div class="col-md-12">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">

               <a class="navbar-brand" href="index.html"><img src="{{ URL::asset('cp/img/logo.png') }}" style="width:100%;max-width:385px;" alt=""></a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
           </div>
           <!-- Top Menu Items -->
           <ul class="nav navbar-right top-nav">
               <li class="profile">

                   <img src="{{ URL::asset('uploads/admins/'.Auth::user()->photo) }}" width="38" class="img-circle pull-right" alt="">
                   <p class="pull-right text-right">{{ Auth::user()->first_name.' '.Auth::user()->last_name }} <br> <a href="{{ URL::to('logout') }}">Logout</a></p>

               </li>
           </ul>
       </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        @include('admin.partials.navigation')
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right">
                        <br><br>
                        <img src="{{ URL::asset('cp/img/logo-colossal.png') }}" width="187" alt="">
                    </div>
                    <div class="clearfix"></div>
                    <h1 class="page-header">
                        @yield('page-header')
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                @yield('content')
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@include('layouts.partials.admin.footer')

</body>

</html>
