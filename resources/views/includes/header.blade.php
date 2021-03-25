<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MONTAGEM DE CARGA</title>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Custom fonts for this template-->
    <!--<link href="../css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
<script>
    function Mudarestado(primeiro, segundo) {
        var display = document.getElementById(primeiro).style.display;
        if (display == "none")
            document.getElementById(primeiro).style.display = 'block';
        else
            document.getElementById(primeiro).style.display = 'none';

        var displayy = document.getElementById(segundo).style.display;
        if (displayy == "block")
            document.getElementById(segundo).style.display = 'none';
        else
            document.getElementById(segundo).style.display = 'block';

    }
</script>

</head>
<body id="page-top">
    <div style="background-color:orange" id="wrapper">
        <ul style="background-color:orange" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a  style="background-color:white"  class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div  class="sidebar-brand-icon" >
                  <!-- <i style="background-color:orange" class="fas fa-laugh-wink"></i>-->
                  <img style="display:none" src="/logo_grande.jpeg" alt="some text" width=100 height=70 id = "logoPequena">
                </div>
                <div ><img style="display:block" src="/logo_grande.jpeg" alt="some text" width=200 height=70 id = "logoGrande"></div>
            </a>
            <!-- Sidebar Toggler (Sidebar) -->
            <div style="background-color: orange" class="text-center d-none d-md-inline">
                <button style="background-color: orange" class="rounded-circle border-0" id="sidebarToggle" onclick="Mudarestado('logoPequena', 'logoGrande')"></button>
            </div>


            <!-- Nav Item - Dashboard -->
            <li style="background-color: orange" class="nav-item active">
                <a style="background-color: orange" class="nav-link" href="{{route('site')}}">
                    <i style="background-color: orange" class="fas fa-fw fa-home"></i>
                    <span style="background-color: orange" >HOME</span></a>
            </li>

            <!-- Heading -->
            <div style="background-color: orange" class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li style="background-color: orange" class="nav-item">
                <a style="background-color: orange" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i style="background-color: orange" class="fas fa-fw fa-cog"></i>
                    <span style="background-color: orange" >Cadastros</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6  class="collapse-header">SISTEMA:</h6>
                        <a href="{{route('listagem.empresaPermissao',  Auth::user()->idNivelAcesso)}}" class="collapse-item" >EMPRESAS</a>
                        <a href="{{route('listagem.filialPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >FILIAIS</a>
                        <a href="{{route('layout.adicionarUsuarioPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >USUARIOS</a>
                        <a href="{{route('listagem.niveisAcessosPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >NIVEIS DE ACESSO</a>
                        <h6  class="collapse-header">VEÍCULO:</h6>
                        <a href="{{route('listagem.veiculoPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >VEÍCULOS</a>
                        <h6  class="collapse-header">PESSOA:</h6>
                        <a href="{{route('listagem.pessoasPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >PESSOA</a>
                        <a href="{{route('listagemClientePermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >CLIENTES</a>
                        <a href="{{route('listagem.confirmaEnderecoPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >CONFIRMAR ENDEREÇO</a>
                        <a href="{{route('listagem.motoristaPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >MOTORISTA</a>
                        <h6  class="collapse-header">CARGAS:</h6>
                        <a href="{{route('listagem.regiaoPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >REGIÃO</a>
                        <a href="{{route('listagem.rotaPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >ROTA</a>
                        <a href="{{route('listagem.pracaPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >PRAÇA</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li style="background-color: orange" class="nav-item">
                <a  style="background-color: orange" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i style="background-color: orange" class="fas fa-fw fa-map-marker"></i>
                    <span>CARGAS</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div  class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MONTAGEM CARGA:</h6>
                        <a href="{{route('filtrosPermissao', Auth::user()->idNivelAcesso)}}" class="collapse-item" >MONTAR CARGA</a>
                    </div>
                </div>
            </li>


            <!-- Heading -->
            <!--<div style="background-color: orange" class="sidebar-heading">
                Addons
            </div>-->

            <!-- Nav Item - Pages Collapse Menu -->
            <!--<li style="background-color: orange" class="nav-item">
                <a style="background-color: orange" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i style="background-color: orange" class="fas fa-fw fa-folder"></i>
                    <span style="background-color: orange">Pages</span>
                </a>
                <div style="background-color: orange" id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div style="background-color: orange" class="bg-white py-2 collapse-inner rounded">
                        <h6 style="background-color: orange" class="collapse-header">Login Screens:</h6>
                        <a style="background-color: orange" class="collapse-item" href="login.html">Login</a>
                        <a style="background-color: orange" class="collapse-item" href="register.html">Register</a>
                        <a style="background-color: orange" class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div style="background-color: orange" class="collapse-divider"></div>
                        <h6 style="background-color: orange" class="collapse-header">Other Pages:</h6>
                        <a style="background-color: orange" class="collapse-item" href="404.html">404 Page</a>
                        <a style="background-color: orange" class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>-->

            <!-- Nav Item - Charts -->
            <!--<li style="background-color: orange" class="nav-item">
                <a style="background-color: orange" class="nav-link" href="charts.html">
                    <i style="background-color: orange" class="fas fa-fw fa-chart-area"></i>
                    <span style="background-color: orange" >Charts</span></a>
            </li>-->

            <!-- Nav Item - Tables -->
            <!--<li style="background-color: orange" class="nav-item">
                <a style="background-color: orange" class="nav-link" href="tables.html">
                    <i style="background-color: orange" class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>-->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                   aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button style=" background-color: orange" class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
                                <!--<img class="img-profile rounded-circle"
                                     src="img/undraw_profile.svg">-->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item"  href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


            </div>
