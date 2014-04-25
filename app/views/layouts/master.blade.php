<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">

  <title>Jolt</title>
  
  @yield('head')
  
</head>
<body class="@yield('body_classes')">
  <div class="container">
    @if (Session::has('successMessage'))
        <div class="message success">
          {{ Session::get('successMessage'); }}
        </div>
    @endif
      @if (Session::has('failMessage'))
        <div class="message failure">
          {{ Session::get('failMessage'); }}
        </div>
    @endif

    @yield('content')
  </div>
</body>
</html>
