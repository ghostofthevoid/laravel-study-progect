<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Fonts -->
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
                        @can('view', auth()->user())
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link">Admin</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link">View products</a>
                        </li>
                        @if(!auth()->check())
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">login</a>
                            </li>
                        @endif
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a href="#"><i class="fas fa-solid fa-shopping-cart"><span><sup id="quantity"></sup></span></i></a>
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
<script>
    import PostComponent from "../../js/components/IndexComponent";
    export default {
        components: {PostComponent}
    }
</script>
</html>
