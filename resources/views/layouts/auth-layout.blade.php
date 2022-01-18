
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <title>Admin Login</title>

    <!-- vendor css -->
    <link href="{{ asset('backend/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bracket.css') }}">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">

  </head>

  <body>

    @yield('admin-layout')

    <script src="{{ asset('backend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ asset('backend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>
</html>
