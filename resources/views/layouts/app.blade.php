<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iOS Club</title>
    <link type="image/png" href="img/iosclub-logo.png" rel="icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="css/app.css" rel="stylesheet">
    <script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="js/app.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script>
    CLUB.run()
    $.stellar();
    </script>
</body>

</html>