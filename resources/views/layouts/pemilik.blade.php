<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')</title>
    {{-- include css --}}
    @include('templates.partials._css')
    {{-- /include css --}}


  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- sidebar menu -->
            @include('templates.partials._sidebar_pemilik')
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        @include('templates.partials._topnav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @include('templates.partials._alerts')
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
        @include('templates.partials._footer')
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- include javascript -->
    @include('templates.partials._script')
    <!-- /include javascript -->

    <!-- custom javascript -->
    @yield('custom-js')
    <!-- custom javascript -->
  </body>
</html>
