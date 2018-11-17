<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<meta http-equiv="refresh" content="5">-->

    <!--<link rel="stylesheet" href="{{ 'css/app.css'}}">
    <link rel="stylesheet" href="{{'css/home.css'}}"> -->
     
    <script type="text/javascript" src="jquery.mask.min.js"></script>
    <script src="{{ URL::to('js/jquery.js')}}" type="text/javascript"></script> 
    <script src="{{ URL::to('js/inputmask-plugin.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
   <link rel="stylesheet" href="{{ URL::to('/css/home.css') }}">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
    integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <title>SisCom</title>
    @yield('estilos')
    <style>
        .corpo{
           margin-top:3rem;
        }


    </style>
</head>
<body>
        <!-- header -->
        
            <header > <!-- style="color:#000000;" -->
               <div class="">
                
                <h1>Sistema de Consultorio Medico</h1>
                <h2 class="logo"><strong>Siscon</strong></h2>
                <span id='real-clock'></span>
                <span><script type="text/javascript" src="{{ asset('js/data.js') }}"></script></span>
                <span style="color:#000000;"><strong>sessao expira em 5 minutos</strong></span>
                <span>Bem vindo @php echo session("user"); @endphp </span>

                </div>
            </header>
 
        <!-- end header -->

        <!-- menu navbar -->
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                <li class="nav-item active">
                  <div class="dropdown">
                    <button class="dropbtn">Cadastro</button>
                    <div class="dropdown-content">
                      <a href="{{route('paciente.novo')}}">Paciente</a>
                      <a href="#">Convenios</a>
                      <a href="{{route('medico.novo')}}">Medico</a>
                      <a href="{{route('funcionario.novo')}}">Funcionario</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Convenios</button>
                    <div class="dropdown-content">
                       <a href="{{route('convenio.novo')}}">Cadastrar</a>
                      <a href="">Pesquisar</a>
                      <a href="{{route('convenio.alterar')}}">Alterar</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Agenda</button>
                    <div class="dropdown-content">
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Medicos</button>
                    <div class="dropdown-content">
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li>
                <!--
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Pacientes</button>
                    <div class="dropdown-content">
                    <a href="{{route('paciente.listar')}}">lista de pacientes</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li> -->
                 <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Funcionarios</button>
                    <div class="dropdown-content">
                    <a href="{{route('funcionario.listar')}}">lista de funcionarios</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li>

              </ul>
              <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-secondary sair "  type="button" href = "{{route('login.logout')}}"><strong>Sair</strong></a>

              </form>
            </div>
        </nav>
        <!-- end navbar -->




        @yield('conteudo')
        @yield('navegação')
        <div class="container col-lg-10" style="">
                   @yield('tela')
            </div>



    <!--<script src="{{ URL::to('js/app.js') }}"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/"></script>
    
    <script  href="{{ asset('js/app.js') }}" type="text/javascript"></script>
     
    <script>
		setInterval(function() {
			clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
		}, 1000);
		var clock = document.getElementById('real-clock');
  </script>


   
   @yield('scripts')
</body>
</html>
