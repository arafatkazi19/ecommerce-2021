
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
      @include('backend.includes.header')
      @include('backend.includes.css')



  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.leftmenubar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.includes.topbar')

    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.includes.rightpanel')

    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        @yield('body-content')
        @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backend.includes.script')


  </body>
</html>
