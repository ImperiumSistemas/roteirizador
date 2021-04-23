@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM CARGAS</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form class="" method="post" action="{{route('listagem.PessoaFiltro')}}">
                {{ csrf_field() }}

                @include('formularios.formularioFiltroCargas')
                <br>
                <div align="middle">

                    <button class="btn btn-success btn-icon-split-lg">FILTRAR</button>
                </div>
            </form>
        </div>
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row">


                <!--<a class="btn green" >ADICIONAR FILIAL</a>-->

                <div><span class="text" style="color:whitesmoke">.....</span></div>
                <div>
                    <button class="btn btn-primary btn-primary" id="editar">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-pencil-ruler"></i>
                            <span class="text">EDITAR</span>
                        </span>
                    </button>
                </div>
                <div><span class="text" style="color:whitesmoke">.....</span></div>
                <div>
                    <button class="btn btn-danger" id="cancelar">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash-alt "></i>
                            <span class="text">CANCELAR CARGA</span>
                        </span>
                    </button>
                </div>
                <div><span class="text" style="color:whitesmoke">.....</span></div>
                <!-- Button trigger modal -->
                <button type="button" id="veiculo" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    ADICIONAR VEICULO
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="minhaTabela">
                    <thead>
                    <tr>
                        <th>ID ROMANEIO</th>
                        <th>CARGA ERP</th>
                        <th>PLACA</th>
                        <th>STATUS</th>
                        <th>DATA</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cargas as $carga)

                            <tr class="">
                                <td>{{$carga->id}}</td>
                                <td>{{$carga->cargaERP}}</td>
                                <td>{{$carga->veiculos_id}}</td>
                                <td>{{$carga->status}}</td>
                                <td>{{$carga->created_at}}</td>
                            </tr>


                    @endForeach
                    </tbody>
                </table>
            </div>
            {{$cargas->links()}}
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalVeiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Veiculo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formVeiculo' action="{{route('addVeiculoCarga')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden"  id='idCargaVeiculo' name='idCargaVeiculo'/>
                        <div class="form-control-lg">
                            <select name="idVeiculo">
                                @foreach($veiculos as $veiculo)
                                    <option value="{{isset($veiculo->id) ? $veiculo->id : ''}}">{{$veiculo->modelo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button id="salvarVeiculo" type="button" class="btn btn-secondary">Salvar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<form id='formEditar' action="{{route('editarPessoa')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='idPessoa' name='idPessoa'/>
    <input type="hidden" id='tipoPessoa' name='tipoPessoa'/>
</form>
<form id='formCancelar' action="{{route('cancelarCarga')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='idCancelar' name='idCancelar'/>
</form>


<script>
    var tabela = document.getElementById("minhaTabela");
    var linhas = tabela.getElementsByTagName("tr");

    for (var i = 0; i < linhas.length; i++) {
        var linha = linhas[i];
        linha.addEventListener("click", function () {
            //Adicionar ao atual
            selLinha(this, false); //Selecione apenas um
            //selLinha(this, true); //Selecione quantos quiser
        });
    }

    function selLinha(linha, multiplos) {
        if (!multiplos) {
            var linhas = linha.parentElement.getElementsByTagName("tr");
            for (var i = 0; i < linhas.length; i++) {
                var linha_ = linhas[i];
                linha_.classList.remove("selecionado");
            }
        }
        linha.classList.toggle("selecionado");
    }

    var btnVisualizar = document.getElementById("editar");
    var btnDesativar = document.getElementById("cancelar");
    var btnVeiculo = document.getElementById("veiculo");

    btnVisualizar.addEventListener("click", function () {
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se eestá selecionado
        if (selecionados.length < 1) {
            alert("Selecione pelo menos uma linha");
            return false;
        }


        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
        }
        let id = selecionado[0].innerHTML;
        let tipo = selecionado[3].innerHTML;

        document.getElementById('idPessoa').value = id;
        document.getElementById('tipoPessoa').value = tipo;
        document.getElementById('formEditar').submit();
    });


    btnDesativar.addEventListener("click", function () {
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se eestá selecionado
        if (selecionados.length < 1) {
            alert("Selecione pelo menos uma linha");
            return false;
        }


        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
        }
        let id = selecionado[0].innerHTML;

        document.getElementById('idCancelar').value = id;
        document.getElementById('formCancelar').submit();
    });

    btnVeiculo.addEventListener("click", function () {
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se eestá selecionado
        if (selecionados.length < 1) {
            alert("Selecione pelo menos uma linha");
            return false;
        }


        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
        }
        let id = selecionado[0].innerHTML;

        document.getElementById('idCargaVeiculo').value = id;
        $("#modalVeiculo").modal();


        //document.getElementById('formCancelar').submit();
    });

    var btnsalvarVeiculo  = document.getElementById("salvarVeiculo");
    btnsalvarVeiculo.addEventListener("click", function () {
        document.getElementById('formVeiculo').submit();
    });
</script>


@include('includes.footer')
