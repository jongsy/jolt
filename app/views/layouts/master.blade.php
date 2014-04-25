<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Jolt!</title>
    @yield('head')
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/css/flat-ui.css" rel="stylesheet">
    <link href="/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="/images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->



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
  <script src="/js/jquery-1.8.3.min.js"></script>
  <script src="/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="/js/jquery.ui.touch-punch.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/bootstrap-select.js"></script>
  <script src="/js/bootstrap-switch.js"></script>
  <script src="/js/flatui-checkbox.js"></script>
  <script src="/js/flatui-radio.js"></script>
  <script src="/js/jquery.tagsinput.js"></script>
  <script src="/js/jquery.placeholder.js"></script>
  @yield('endscripts')
  <script src="/js/main.js"></script>
</body>
</html>
