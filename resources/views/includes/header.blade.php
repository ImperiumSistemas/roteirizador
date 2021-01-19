<!DOCTYPE html>
<html>
  <head>
    <title> @yield('titulo') </title>


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>



    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>

    <header>
      <!-- Dropdown Structure -->
          <ul id="cadastros" class="dropdown-content">
            <li><a href="{{route('listagem.empresa')}}">EMPRESAS</a></li>
            <li><a href="{{route('listagem.filiais')}}">FILIAIS</a></li>
            <li class="divider"></li>
              <li><a href="{{route('listagem.veiculo')}}">VEICULOS</a></li>
            <li class="divider"></li>
              <li><a href="{{route('listagem.motorista')}}">MOTORISTA</a></li>
              <li><a href="{{route('listagemCliente')}}">CLIENTES</a></li>
              <li><a href="{{route('listagem.pessoas')}}">PESSOAS</a></li>
              <li><a href="{{route('listagem.endereco')}}">ENDERECO</a></li>
            <li class="divider"></li>
              <li><a href="{{route('listagem.praca')}}">PRAÇA</a></li>
              <li><a href="{{route('listagem.rota')}}">ROTA</a></li>
              <li><a href="{{route('listagem.regiao')}}">REGIÃO</a></li>
          </ul>
      <nav>
          <div class="nav-wrapper deep-orange">
            <img src="/logo.jpg" alt="some text" width=80 height=64>
          <a href="#!" class="brand-logo">ROTEIRIZADOR</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/site">HOME</a></li>
              <!--<li><a href="{{route('listagem.veiculo')}}">VEICULOS</a></li>
            <li><a href="{{route('listagem.motorista')}}">MOTORISTA</a></li>
            <li><a href="{{route('listagem.filiais')}}">FILIAIS</a></li>
            <li><a href="{{route('listagem.empresa')}}">EMPRESAS</a></li>
            <li><a href="{{route('listagem.praca')}}">PRAÇA</a></li>
            <li><a href="{{route('listagem.rota')}}">ROTA</a></li>
            <li><a href="{{route('listagem.regiao')}}">REGIÃO</a></li>
            <li><a href="{{route('listagem.cidade')}}">CIDADES</a></li>
            <li><a href="{{route('listagem.pais')}}">PAIS</a></li>
            <li><a href="{{route('listagem.bairros')}}">BAIRROS</a></li>
            <li><a href="{{route('listagem.endereco')}}">ENDERECO</a></li>
            <li><a href="{{route('listagem.pessoas')}}">PESSOAS</a></li>
            <li><a href="{{route('listagemCliente')}}">CLIENTES</a></li>-->
            <li><a class="dropdown-trigger" href="#!" data-target="cadastros">CADASTROS<i class="material-icons right"></i></a></li>


          </ul>
          </div>
    </nav>

          <ul class="sidenav" id="mobile">
            <li><a href="/site">Home</a></li>

          </ul>

    </header>

    <script> $(".dropdown-trigger").dropdown();</script>
