<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ asset('', Request::secure()) }}">
    <title>Listagem de pedidos | Projeto Esfera</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
    <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />


    
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>  


    <link href="{{ asset('/assets/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/plugin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/line.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/custom.css?') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">

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
<div class="breadcrumb-main user-member justify-content-sm-between ">
<div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
<div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
<h4 class="text-capitalize fw-500 breadcrumb-title">Listagem de pedidos</h4>
<span class="sub-title ms-sm-25 ps-sm-25">Home</span>
</div>


</div>
<div class="action-btn">

<a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal" data-bs-target="#new-member">
<i class="las la-plus fs-16"></i>Novo Pedido</a>

</div>
</div>

<!--Modal Novo Pedido --> 
<div class="modal fade new-member " id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content  radius-xl">
<div class="modal-header">
<h6 class="modal-title fw-500" id="staticBackdropLabel">Novo Pedido</h6>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img//svg/x.svg" alt="x" class="svg">
</button>
</div>


<div class="modal-body">
<div class="new-member-modal">

<!--Form Novo Pedido --> 
<form action="{{ route('pedidos.novopedido') }}" method="post" onsubmit="btnsubmit.disabled = true; return true;">
 @csrf

<!-- <div class="form-group mb-20">
<input type="text" class="form-control" placeholder="Duran Clayton">
</div> -->

<div class="form-group mb-20">
<div class="category-member">
<label class="mb-15">Produto</label>
<select class="js-example-basic-single js-states form-control" id="novopedido_produto" name="novopedido_produto" required>
<option value="">Selecione abaixo</option>
@foreach($produtos as $produto)
<option value="{{$produto->id}}">{{$produto->nome}} - {{$produto->descricao}}</option>
@endforeach
</select>
</div>
</div>

<div class="form-group mb-20">
<div class="category-member">
<label class="mb-15">Cliente</label>
<select class="js-example-basic-single js-states form-control" name="novopedido_cliente" id="novopedido_cliente" required>
<option value="">Selecione abaixo</option>
@foreach($clientes as $cliente)
<option value="{{$cliente->id}}">{{$cliente->nome}} - {{$cliente->codigo}}</option>
@endforeach
</select>
</div>
</div>

<div class="form-group mb-20">
<div class="category-member">
<label class="mb-15">Status</label>
<select class="js-example-basic-single js-states form-control" name="novopedido_status" id="novopedido_status" required>
<option value="Aberto">Aberto</option>
<option value="Pago">Pago</option>
<option value="Cancelado">Cancelado</option>
</select>
</div>
</div>

<div class="form-group mb-20">
<label class="mb-15">Descrição do pedido</label>
<textarea class="form-control" id="novopedido_descricao" name="novopedido_descricao" rows="2" placeholder="Descrição do pedido (Opcional)"></textarea>
</div>

<div class="form-group mb-3">
<label class="mb-15">Quantidade</label>
<input type="number" id="novopedido_quantidade" name="novopedido_quantidade" class="form-control" value="1" required>
</div>


</div>

<div class="button-group d-flex pt-25">
<button type="submit" id="btnsubmit" class="btn btn-primary btn-default btn-squared text-capitalize">Cadastrar novo pedido
</button>

<button type="button" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light" data-bs-dismiss="modal">Cancelar</button>
</div>
</form>
<!--Fim Form Novo Pedido --> 

</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<!--Fim Modal Novo Pedido --> 


            <!--Datatable --> 


            <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            <th>Pedido</th>
            <th>Produto</th>
            <th>Cliente</th>
            <th>Valor total</th>
            <th>Data</th>
            <th>Status</th>
            <th>Ação</th>
            </tr>
        </thead>
        <tbody>

        @foreach($pedidos as $pedido)
                                <tr>
                                    <td>
                                    {{$pedido->id}}
                                    </td>

                                    <td>
                                    {{$pedido->produto_descricao}}
                                    </td>

                                    <td>
                                    {{$pedido->cliente_nome}}
                                    </td>

                                    <td>
                                    R$ {{$pedido->valor_total}}
                                    </td>

                                    <td>
                                    {{ date('d/m/Y H:i:s', strtotime($pedido->data)) }}
                                    </td>

                                    <td>
                                    {{$pedido->status}}
                                    </td>

                                    <td>
                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">

                                    <li>
                                    <a href="{{ route('pedidos.viewpedido', $pedido->id) }}" class="view">
                                    <i class="uil uil-eye"></i>
                                    </a>
                                    </li>


                                    </ul>
                                    </td>


                                </tr>
                                @endforeach           
         
        </tbody>
    </table>



            <!--Fim Datatable --> 




                
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>    

   


    @include('sweetalert::alert')

    @stack('scripts')


    <script>
    $(document).ready(function () {
    $('#example').DataTable({
    "language": {
    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
    },
    "responsive": true,
        columnDefs: [
            {
                targets: [0],
                orderData: [0, 1],
            },
            {
                targets: [1],
                orderData: [1, 0],
            },
            {
                targets: [4],
                orderData: [4, 0],
            },
        ],
    });
    });
    </script>




</body>
</html>
