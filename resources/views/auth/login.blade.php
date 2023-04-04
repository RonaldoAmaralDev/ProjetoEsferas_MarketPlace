<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Projeto Laravel Ronaldo Amaral">
    <meta name="author" content="Ronaldo Amaral">
    <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
   <link rel="icon" href="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/09/cropped-cropped-cropped-logo-esferas-v3-1.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />

    <link href="public/login/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/login/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/login/css/style.css" rel="stylesheet">

    <title>Login | Projeto Esferas </title>
  </head>
  <body>
    <section class="form-02-main">



      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="https://i0.wp.com/esferas.com.br/wp-content/uploads/2021/08/43df1-cropped-cropped-logo-esferas-v3.png">
                </div>

                <form id ="form"  role="form" action="{{ route('login') }}" method="POST" role="login" >
                {{ csrf_field() }}

                <div class="form-inputslogin">

                <div class="form-group">
                   
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Login" required="" aria-required="true" autofocus>
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Senha" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <div class="_btn_04">
                    <a href="#" onclick="document.getElementById('form').submit();">Entrar</a>
                  </div>
                </div>

                <!--<p><a class="form-group nm_lk" href="{{ route('password.request') }}">ESQUECEU SUA SENHA? CLIQUE AQUI</a></p>-->
                <p><a class="form-group nm_lk" href="#">ESQUECEU SUA SENHA? CLIQUE AQUI</a></p>

                </div>
                </form>



              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>