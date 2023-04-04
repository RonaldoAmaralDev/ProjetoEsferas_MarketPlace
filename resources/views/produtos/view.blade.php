<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ asset('', Request::secure()) }}">
    <title>Visualizar produto | Projeto Esferas</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
   <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />

    <link href="../public/assets/css/plugin.min.css?" rel="stylesheet">
    <link href="../public/assets/css/style.min.css?" rel="stylesheet">

    <link href="../public/assets/css/line.css?" rel="stylesheet">
    <link href="../public/assets/css/custom.css?" rel="stylesheet">
    
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>  
    
</head>

<body class="layout-light">
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href="#"><img class="dark" src="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/08/43df1-cropped-cropped-logo-esferas-v3.png" alt="logo"></a>
                    <a href="#" class="sidebar-toggle"><img class="svg" src="public/assets/img/svg/align-center-alt.svg" alt="img"></a>
                </div>
            </div>

            <div class="navbar-right">
                <ul class="navbar-right__menu">

                    <li class="nav-notification">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <img class="svg" src="../public/assets/img/svg/alarm.svg" alt="img">
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <h2 class="dropdown-wrapper__title">Notificações <span class="badge-circle badge-warning ms-1">0</span>
                                    </h2>
                                    <ul>
          
                                    </ul>
                                    <a href="#" class="dropdown-wrapper__more">Ver todas notificações</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/author-nav.jpg" alt="" class="rounded-circle">
                                <span class="nav-item__title">{{ Auth::user()->name }}<i class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                            <img src="" alt="" class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <span class="text-uppercase">{{ Auth::user()->type }}</span>
                                        </div>
                                    </div>
                                    <div class="nav-author__options">
                                        <ul>
                                            <li><a href="#"><i class="uil uil-user"></i> Minha conta</a></li>
                                        </ul>
                                        <a href="{{ route('logout') }}" class="nav-author__signout"><i class="uil uil-sign-out-alt"></i> Logout</a>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                    </li>

                </ul>
                <div class="navbar-right__mobileAction d-md-none">
                    <a href="#" class="btn-author-action"><img class="svg" src="public/assets/img/svg/more-vertical.svg" alt="more-vertical"></a>
                </div>
            </div>

        </nav>
    </header>

    <main class="main-content">

        <div class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">


<li class="has-child">
    <a href="#" class="">
        <span class="nav-icon uil uil-user"></span>
        <span class="menu-text">{{ __('Pedidos') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class=""><a href="{{ route('pedidos.index') }}">Listagem de pedidos</a></li>
    </ul>
</li>

<li class="has-child">
    <a href="#" class="">
        <span class="nav-icon uil uil-user"></span>
        <span class="menu-text">{{ __('Produtos') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
    <li class=""><a href="{{ route('produtos.index') }}">Listagem de produtos</a></li>
    </ul>
</li>

<li class="has-child">
    <a href="#" class="">
        <span class="nav-icon uil uil-user"></span>
        <span class="menu-text">{{ __('Clientes') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
    <li class=""><a href="{{ route('clientes.index') }}">Visualizar produto</a></li>
    </ul>
</li>



                      
                    </ul>
                </div>
            </div>
        </div>

        <div class="contents">
            <div class="crm mb-25">





    <div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="shop-breadcrumb">
<div class="breadcrumb-main">
<h4 class="text-capitalize breadcrumb-title">Visualizar produto</h4>
<div class="breadcrumb-action justify-content-center flex-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Visualizar produto</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="products mb-30">
<div class="container-fluid">

<div class="card product-details h-100 border-0">
<div class="product-item d-flex p-sm-50 p-20">
<div class="row">
<div class="col-lg-5">

<div class="product-item__image">
<div class="wrap-gallery-article carousel slide carousel-fade" id="carouselExampleCaptions" data-bs-ride="carousel">
<div>
<div class="carousel-inner">
<div class="carousel-item active">
<img class="img-fluid d-flex bg-opacity-primary " src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/furniture.jpg" alt="Card image cap" title="">
</div>
<div class="carousel-item">
<img class="img-fluid d-flex bg-opacity-primary" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/furniture2.jpg" alt="Card image cap" title="">
</div>
<div class="carousel-item">
<img class="img-fluid d-flex bg-opacity-primary" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/furniture3.jpg" alt="Card image cap" title="">
</div>
</div>
</div>
<div class="overflow-hidden">

<ul class="reset-ul d-flex flex-wrap list-thumb-gallery">
<li>
<a href="#" class="thumbnail active" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1">
<img class="img-fluid d-flex" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/furniture.jpg" alt="">
</a>
</li>
<li>
<a href="#" class="thumbnail " data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2">
<img class="img-fluid d-flex" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/furniture2.jpg" alt="">
</a>
</li>
<li>
<a href="#" class="thumbnail " data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3">
<img class="img-fluid d-flex" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/furniture3.jpg" alt="">
</a>
</li>
</ul>
</div>
</div>
</div>

</div>
<div class=" col-lg-7">

<div class=" b-normal-b mb-25 pb-sm-35 pb-15 mt-lg-0 mt-15">
<div class="product-item__body">

<div class="product-item__title">
<a href="#">
<h1 class="card-title">{{$produtos->nome}}</h1>
</a>
</div>

<div class="product-item__content text-capitalize">

<div class="stars-rating d-flex align-items-center">
<span class="star-icon las la-star active"></span>
<span class="star-icon las la-star active"></span>
<span class="star-icon las la-star active"></span>
<span class="star-icon las la-star active"></span>
<span class="star-icon las la-star-half-alt active"></span>
<span class="stars-rating__point">4.9</span>
<span class="stars-rating__review">
<span>1</span> Avaliações</span>
</div>


<span class="product-desc-price">
<sub>R$</sub> {{$produtos->valor}}</span>
<div class="d-flex align-items-center mb-2">
<span class="product-price">R$ {{$produtos->valor}}</span>
<span class="product-discount">{{$produtos->desconto}}% desconto</span>
</div>


<p class=" product-deatils-pera">{{$produtos->descricao}}</p>


<div class="product-details__availability">
<div class="title">
<p>Disponibilidade:</p>
<span class="stock">Em estoque</span>
</div>
</div>


<div class="quantity product-quantity flex-wrap">
<div class="me-15 d-flex align-items-center flex-wrap">
<p class="fs-14 fw-500 color-dark">Quantidade:</p>
<input type="button" value="-" class="qty-minus bttn bttn-left wh-36">
<input type="number" value="1" class="qty qh-36 input">
<input type="button" value="+" class="qty-plus bttn bttn-right wh-36">
</div>
<span class="fs-13 fw-400 color-light my-sm-0 my-10">540 items disponíveis</span>
</div>


<div class="product-item__button mt-lg-30 mt-sm-25 mt-20 d-flex flex-wrap">
<div class=" d-flex flex-wrap product-item__action align-items-center">

<a href="{{ route('produtos.index') }}">
<button class="btn btn-primary btn-default btn-squared border-0 me-10 my-sm-0 my-2">Editar</button>
</a>


<form action="{{ route('produtos.ocultar') }}" method="post">
@csrf
<input type="hidden" name="produto_id" id="produto_id" value="{{$produtos->id}}">
<button class="btn btn-primary btn-default btn-squared border-0 me-10 my-sm-0 my-2">Desabilitar</button>
</form>

<div class="like-icon">
<button type="button">
<i class="lar la-heart icon"></i>
</button>
</div>
<div class="like-icon me-15 my-sm-0 my-3 ">
<button type="button">
<img class="svg" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/share-2.svg" alt="share-2">
</button>
</div>
</div>
<div class="product-deatils__social my-xxl-0 my-10 d-flex align-items-center">
<ul class="d-flex">
<li>
<a href="#">
<i class="lab la-facebook-f"></i>
</a>
</li>
<li>
<a href="#">
<i class="lab la-twitter"></i>
</a>
</li>
<li>
<a href="#">
<i class="lab la-pinterest"></i>
</a>
</li>
<li>
<a href="#">
<i class="lab la-linkedin-in"></i>
</a>
</li>
<li>
<a href="#">
<i class="lab la-telegram"></i>
</a>
</li>
</ul>
</div>
</div>

</div>
</div>
</div>

<div class="product-details__availability">
<div class="title">
<p>Categoria:</p>
<span class="free">{{$produtos->categoria}}</span>
</div>
<div class="title">
<p>Tags:</p>
<span class="free"> {{$produtos->categoria}}</span>
</div>
</div>


</div>
</div>
</div>
</div>

</div>
</div>


            </div>
        </div>

        <footer class="footer-wrapper">
            <div class="footer-wrapper__inside">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-copyright">
                                <p><span>© 2023</span><a href="https://wa.me/5531975465685">Projeto Ronaldo G Amaral</a>, todos os direitos reservados.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-menu text-end">
                                <ul>
                                    <li><a href="https://github.com/RonaldoAmaralDev">Github</a></li>
                                    <li><a href="https://www.linkedin.com/in/ronaldobh/">Linkedin</a></li>
                                    <li><a href="https://wa.me/5531975465685">Meu Whatsapp</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>
    
    <div id="overlayer" class="loader">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>


    
    <script src="../public/assets/js/plugins.min.js"></script>
    <script src="../public/assets/js/script.min.js"></script>
    <script src="../public/assets/js/jquery-migrate-3.3.2.js"></script>
    <script src="../public/assets/js/jquery.maskedinput.min.js"></script>
    <script src="../public/assets/js/models/mootools-core-1.4.5.js"></script>
    <script src="../public/assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>    

    @include('sweetalert::alert')

    @stack('scripts')

</body>
</html>
