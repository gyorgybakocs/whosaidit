<!doctype html>
<html lang="hu_hu">
<head>
    <meta charset="utf-8">
    @yield('head')
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect dns-prefetch" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="body">
    <div role="main">
        <header>
        </header>
        @yield('navbar')
        @yield('breadcrumb')
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    @yield('rightcol')
                </div>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>