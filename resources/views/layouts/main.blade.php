<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fw-bolder bg-primary py-3 fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">TaoBao</a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navmenu" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link">Create product</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link">View products</a>
                        </li>
                        <li class="nav-item">
                            <a href="#"><i class="fa-solid fa-cart-shopping"><span><sup id="quantity"></sup></span></i></a>
                        </li>

                    </ul>
                </div>
            </div>

        </nav>
    </header>
</head>
<body>
    @yield('content');
</body>
</html>
