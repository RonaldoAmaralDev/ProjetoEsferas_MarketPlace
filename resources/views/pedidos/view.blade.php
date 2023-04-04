<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ asset('', Request::secure()) }}">
    <title>Visualizar pedido | Projeto Esferas</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
   <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />

    <!-- <link href="./public/assets/css/plugin.min.css?" rel="stylesheet">
    <link href="./public/assets/css/style.min.css?" rel="stylesheet"> -->

    <link href="{{ asset('/assets/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/plugin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/line.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/custom.css?') }}" rel="stylesheet">
    
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>  

    
    
</head>

<body class="layout-light">
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href="#"><img class="dark" src="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/08/43df1-cropped-cropped-logo-esferas-v3.png" alt="logo"></a>
                    <a href="#" class="sidebar-toggle"><img class="svg" src="{{ asset('/assets/img/svg/align-center-alt.svg') }}" alt="img"></a>
                </div>
            </div>

            <div class="navbar-right">
                <ul class="navbar-right__menu">
                
                    <li class="nav-notification">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <img class="svg" src="{{ asset('/assets/img/svg/alarm.svg') }}" alt="img">
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
                    <a href="#" class="btn-author-action"><img class="svg" src="{{ asset('/assets/img/svg/more-vertical.svg') }}" alt="more-vertical"></a>
                </div>
            </div>

        </nav>
    </header>

    <main class="main-content">

        <div class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse collapsed" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">


                    <br><br>


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
    <li class=""><a href="{{ route('clientes.index') }}">Listagem de clientes</a></li>
    </ul>
</li>



                      
                    </ul>
                </div>
            </div>
        </div>

        <div class="contents">
            <div class="crm mb-25">



            <br><br>
 
            <div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="shop-breadcrumb">
<div class="breadcrumb-main">

<h4 class="text-capitalize breadcrumb-title">Visualizar pedido</h4>
<div class="breadcrumb-action justify-content-center flex-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('pedidos.index') }}"><i class="uil uil-estate"></i>Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Visualizar pedido</li>
</ol>
</nav>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="payment-invoice global-shadow radius-xl w-100 mb-30">
<div class="payment-invoice__body">
<div class="payment-invoice-address d-flex justify-content-sm-between">
<div class="payment-invoice-logo">
<a href="{{ route('pedidos.index') }}">
<img class="dark" src="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/08/43df1-cropped-cropped-logo-esferas-v3.png" alt="logo">
<img class="light" src="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/08/43df1-cropped-cropped-logo-esferas-v3.png" alt="logo">
</a>
</div>

<div class="payment-invoice-address__area">
<address>Projeto Esferas<br> Rua Grão Mogol 360,<br> Belo Horizonte, MG<br>
Inscrição: 245000003513</address>
</div>

</div>

<div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
<div class="d-flex justify-content-center mb-lg-0 mb-25">
<div class="payment-invoice-qr__number">
<div class="display-3">Pedido</div>

<p>Número : <span>#{{$datas->id}}</span></p>
<p>Data : <span>{{ date('d/m/Y H:i:s', strtotime($datas->data)) }}</span></p>
</div>
</div>

<div class="d-flex justify-content-center mb-lg-0 mb-25">
<div class="payment-invoice-qr__code bg-white radius-xl p-20">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/qr.png" alt="qr">
<p>8364297359912267</p>
</div>
</div>

<div class="d-flex justify-content-center">
<div class="payment-invoice-qr__address">
<p>Pedido para:</p>
<span>{{$datas->cliente_nome}}</span><br>
<span>{{$datas->clientes_endereco}}, Nº {{$datas->clientes_numero}}, {{$datas->clientes_complemento}}, {{$datas->clientes_bairro}}</span><br>
<span>{{$datas->clientes_cidade}}, {{$datas->clientes_uf}}, {{$datas->clientes_cep}}, {{$datas->clientes_pais}}</span>
</div>
</div>
</div>

<div class="payment-invoice-table">
<div class="table-responsive">
<table id="cart" class="table table-borderless">
<thead>
<tr class="product-cart__header">
<th scope="col">#</th>
<th scope="col">Produto</th>
<th scope="col" class="text-end">Valor únitario</th>
<th scope="col" class="text-end">Quantidade</th>
<th scope="col" class="text-end">Valor total</th>
</tr>
</thead>
<tbody>
<tr>
<th>{{$datas->id}}</th>

<td class="Product-cart-title">
<div class="media  align-items-center">
<div class="media-body">
<h5 class="mt-0">{{$datas->produto_descricao}}</h5>
</div>
</div>
</td>

<td class="unit text-end">R$ {{$datas->valor_unitario}}</td>
<td class="invoice-quantity text-end">{{$datas->quantidade}}</td>
<td class="text-end order">R$ {{$datas->valor_total}}</td>
</tr>

</tbody>
<tfoot>


<tr>
<td colspan="3"></td>
<td class="order-summery float-right border-0   ">
<div class="total">


<div class="taxes mb-0 text-end">
Desconto :
</div>

</div>

<div class="total-money mt-2 text-end">
<h6>Total :</h6>
</div>

</td>

<td>
<div class="total-order float-right text-end fs-14 fw-500">
<p>{{$datas->desconto}} %</p>
<h5 class="text-primary">R$ {{$datas->valor_total}}</h5>
</div>
</td>

</tr>

</tfoot>
</table>

</div>

<div class="payment-invoice__btn mt-xxl-50 pt-xxl-30">
<button type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/printer.svg" alt="printer" class="svg">Imprimir</button>

<button type="button" class="btn-primary btn rounded-pill px-25 text-white download">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/upload.svg" alt="upload" class="svg">Download</button>
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


    

    <script src="{{ asset('/assets/js/plugins.min.js') }}" ></script>
    <script src="{{ asset('/assets/js/script.min.js') }}" ></script>
    <script src="{{ asset('/assets/js/jquery-migrate-3.3.2.js') }}" ></script>
    <script src="{{ asset('/assets/js/jquery.maskedinput.min.js') }}" ></script>
    <script src="{{ asset('/assets/js/mootools-core-1.4.5.js') }}" ></script>
    <script src="{{ asset('/assets/js/main.js') }}" ></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>    

    @include('sweetalert::alert')




</body>
</html>
