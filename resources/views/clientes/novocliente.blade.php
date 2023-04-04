<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ asset('', Request::secure()) }}">
    <title>Novo cliente | Projeto Esferas </title>
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
    <li class=""><a href="{{ route('clientes.index') }}">Listagem de clientes</a></li>
    </ul>
</li>



                      
                    </ul>
                </div>
            </div>
        </div>

        <div class="contents">
            <div class="crm mb-25">


            <div class="profile-setting ">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="breadcrumb-main">
               <h4 class="text-capitalize breadcrumb-title">Novo cliente</h4>
               <div class="breadcrumb-action justify-content-center flex-wrap">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}"><i class="uil uil-estate"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Novo cliente</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <div class="col-xxl-3 col-lg-4 col-sm-5">
            <div class="card mb-25">
               <div class="card-body text-center p-0">
                  <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                     <div class="ap-img mb-20 pro_img_wrapper">
                        <input id="file-upload" type="file" name="fileUpload" class="d-none">
                        <label for="file-upload">
                        <img class="ap-img__main rounded-circle wh-120" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/author/profile.png" alt="profile">
                        <span class="cross" id="remove_pro_pic">
                        <img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/camera.svg" alt="camera" class="svg">
                        </span>
                        </label>
                     </div>
                     <!-- <div class="ap-nameAddress pb-3">
                        <h5 class="ap-nameAddress__title">Nome</h5>
                        <p class="ap-nameAddress__subTitle fs-14 m-0">Nome</p>
                     </div> -->
                  </div>
                  <div class="ps-tab p-20 pb-25">
                     <div class="nav flex-column text-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-selected="true">
                        <img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/user.svg" alt="user" class="svg">Dados cadastrais</a>
                       
                        <!-- <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-selected="false">
                        <img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/settings.svg" alt="setting" class="svg">Alterar username</a>
                      
                        <a class="nav-link" id="v-pills-email-tab" data-bs-toggle="pill" href="#v-pills-email" role="tab" aria-selected="false">
                        <img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/mail.svg" alt="setting" class="svg">Alterar e-mail</a>

                        <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-selected="false">
                        <img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/key.svg" alt="key" class="svg">Alterar senha</a> -->
                       


                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="col-xxl-9 col-lg-8 col-sm-7" style="margin-top:-25px;">

               <div class="tab-content" id="v-pills-tabContent">


                  <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                     <div class="edit-profile mt-25">
                        <div class="card">
                           <div class="card-header px-sm-25 px-3">
                              <div class="edit-profile__title">
                                 <h6>Dados cadastrais</h6>
                                 <span class="fs-13 color-light fw-400">Favor preencher o máximo de informações para facilitar o faturamento e relacionamento das informações.</span>
                              </div>

       
                           </div>
                           <div class="card-body">
                              <div class="row justify-content-center">

                              <form action="{{ route('clientes.add') }}" method="post" onsubmit="btnsubmit.disabled = true; return true;">
                              @csrf
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="card">
                                             <div class="card-header">
                                                <h5>Informações Pessoais</h5>

                                             </div>
                                             <div class="card-body">

                                                <div class="row">

                                                   <div class="col-md-3">
                                                      <div class="form-group">
                                                         <label for="">Nome Completo</label>
                                                         <input type="text" name="novocliente_nome" id="novocliente_nome" class="form-control" value='' required>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-3">
                                                      <div class="form-group">
                                                         <label for="">CPF\CNPJ</label>
                                                         <input type="text" name="novocliente_codigo" id="novocliente_codigo" class="form-control" value='' required>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-3">
                                                      <div class="form-group">
                                                         <label for="">E-mail</label>
                                                         <input type="email" name="novocliente_email" id="novocliente_email" class="form-control" value='' required>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-3">
                                                      <div class="form-group">
                                                         <label for="">Telefone\Celular</label>
                                                         <input type="text" name="novocliente_telefone" id="novocliente_telefone"  class="form-control" value='' required>
                                                      </div>
                                                   </div>

                                                </div>

                                                <div class="row">

                                                   <div class="col-md-2">
                                                      <div class="form-group">
                                                         <label for="">CEP</label>
                                                         <input type="text" name="novocliente_cep" id="novocliente_cep" class="form-control" value='' maxlength="9" onblur="pesquisacep();" required>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Endereço</label>
                                                         <input type="text" name="novocliente_endereco" id="novocliente_endereco" class="form-control" value='' readonly>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-2">
                                                      <div class="form-group">
                                                         <label for="">Número</label>
                                                         <input type="number" name="novocliente_numero" id="novocliente_numero" class="form-control" value='' required>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-2">
                                                      <div class="form-group">
                                                         <label for="">Complemento</label>
                                                         <input type="text" name="novocliente_complemento" id="novocliente_complemento" class="form-control" value=''>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-2">
                                                      <div class="form-group">
                                                         <label for="">Bairro</label>
                                                         <input type="text" name="novocliente_bairro" id="novocliente_bairro" class="form-control" value='' readonly>
                                                      </div>
                                                   </div>

                                                </div>

                                                <div class="row">

                                                   <div class="col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Cidade</label>
                                                         <input type="text" name="novocliente_cidade" id="novocliente_cidade" class="form-control" value='' readonly>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-1">
                                                      <div class="form-group">
                                                         <label for="">UF</label>
                                                         <input type="text" name="novocliente_estado" id="novocliente_estado" class="form-control" value='' readonly>
                                                      </div>
                                                   </div>

                                                   <div class="col-md-2">
                                                      <div class="form-group">
                                                         <label for="">País</label>
                                                         <input type="text" name="novocliente_pais" id="novocliente_pais" class="form-control" value='' readonly>
                                                      </div>
                                                   </div>

                                                </div>

                                                <div class="button-group d-flex flex-wrap pt-35 mb-35">
                                                <button type="submit" id="btnsubmit" class="btn btn-primary btn-default btn-squared me-15 text-capitalize">Cadastrar cliente
                                                </button>
                                                 </div>


                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <!--Fim --> 
                              
                                    </div>
                                    </div>

                                 </form>
                                 </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!--Fim Tab --> 

                
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

    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="../public/assets/js/valida_cpf_cnpj.js"></script>
    <script src="../public/assets/js/exemplo_2.js"></script>


    @include('sweetalert::alert')

    @stack('scripts')


    <script type="text/javascript">

        jQuery("#novocliente_telefone")
            .mask("(99) 9999-9999?9")
            .focusout(function (event) {  
                var target, phone, element;  
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                phone = target.value.replace(/\D/g, '');
                element = $(target);  
                element.unmask();  
                if(phone.length > 10) {  
                    element.mask("(99) 9999-9999");  
                } else {  
                    element.mask("(99) 3999-9999");  
                }  
            });
    </script>

   <script language="javascript">   
    $(document).ready(function($){
    $("input[id*='novocliente_codigo']").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99']
    });

    });
    </script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('novocliente_endereco').value=(conteudo.logradouro);
            document.getElementById('novocliente_bairro').value=(conteudo.bairro);
            document.getElementById('novocliente_cidade').value=(conteudo.localidade);
            document.getElementById('novocliente_estado').value=(conteudo.uf);
            document.getElementById('novocliente_pais').value=('Brasil');
        } //end if.
        else {
            //CEP não Encontrado.
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep() {

      var valor = document.getElementById("novocliente_cep").value

        //Nova variável "cep" somente com dígitos.
        var cep = valor;

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('novocliente_endereco').value="...";
                document.getElementById('novocliente_bairro').value="...";
                document.getElementById('novocliente_cidade').value="...";
                document.getElementById('novocliente_estado').value="...";
                document.getElementById('novocliente_pais').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                alert("Formato de CEP inválido.");
            }
    };

    </script>


</body>
</html>
