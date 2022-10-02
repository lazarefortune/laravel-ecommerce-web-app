<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>E-commerce</title>

    @yield('extra-script')

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="{{ route('cart.index') }}">
                    <span class="badge badge-pill badge-dark"> {{ Cart::count() }} </span>
                    <i data-feather="shopping-bag" stroke-width="2" width="20" height="20"></i>
                </a>
                <!-- <a href="{{ route('cart.videpanier') }}">Vider</a> -->
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ route('products.index') }}">E-Shop</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @guest
                    <a class="btn btn-sm btn-success mr-1" href="{{ route('login') }}">Connexion</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Inscription</a>
                @else
                    <a class="btn btn-sm btn-outline-secondary mr-1" href="{{ route('products.create') }}">
                        <i data-feather="plus" stroke-width="2" width="16" height="16"></i>
                        Ajouter un produit
                    </a>

                    <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Se déconnecter') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                @endguest
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="#">Technologie</a>
            <a class="p-2 text-muted" href="#">Design</a>
            <a class="p-2 text-muted" href="#">Vêtements</a>
            <a class="p-2 text-muted" href="#">Accéssoires</a>
            <a class="p-2 text-muted" href="#">Outils</a>
            <a class="p-2 text-muted" href="#">Technologie</a>
            <a class="p-2 text-muted" href="#">Design</a>
            <a class="p-2 text-muted" href="#">Vêtements</a>
            <a class="p-2 text-muted" href="#">Accéssoires</a>
            <a class="p-2 text-muted" href="#">Outils</a>
        </nav>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

</div>

<footer class="blog-footer">
    <p>Conçu par <a href="https://lazarefortune.com" target="_blank">Lazare Fortune</a></p>
</footer>

<!-- jquery local -->
<script src="{{ asset('bootstrap/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

@yield('extra-js')

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.19.0/feather.min.js"></script>
<script type="text/javascript">
    feather.replace();
</script>

</body>
</html>
