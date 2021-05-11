@include('includes.header')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ADICIONAR MOTORISTA</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" >
            <a href="{{route('listagem.motorista')}}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                <span class="text">LISTAGEM</span>
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="input-field">
          <form method="post" action="{{route('pesquisaMotorista')}}">
            {{ csrf_field() }}
            <input type="text" minlength="14" data-mask="000.000.000-00" placeholder="000.000.000-00"  name="cpf" required>
            <button>PESQUISAR MOTORISTA</button>
          </form>
        </div>
        <br/><br/>
        <form class="" method="post" action="{{route('layout.salvarMotoristaJuridico')}}" >
            {{ csrf_field() }}

            @include('formularios.formularioMotoristaJuridico')
            <div align="middle">
                <p class="mb-4"></p>
                <p class="mb-4"></p>
                <button class="btn btn-success btn-icon-split-lg" >Salvar</button>
            </div>
        </form>
    </div>

@include('includes.footer')
