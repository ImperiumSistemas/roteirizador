@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM PESSOAS</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form class="" method="post" action="{{route('listagem.PessoaFiltro')}}">
                {{ csrf_field() }}


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
                <a href="{{route('layout.adicionarPessoaFisica', 1)}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-plus-square"></i>
                    </span>
                    <span class="text">ADICIONAR PESSOA FISICA</span>
                </a>
                <div><span class="text" style="color:whitesmoke">.....</span></div>
                <a href="{{route('layout.adicionarPessoaFisica', 2)}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-plus-square"></i>
                    </span>
                    <span class="text">ADICIONAR PESSOA JURIDICA</span>
                </a>
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
                    <button class="btn btn-danger" id="desativar">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash-alt "></i>
                            <span class="text">DESATIVAR</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="minhaTabela">
                    <thead>
                    <tr>
                        <th>ID CARGA</th>
                        <th onclick="sortTable(document.getElementById('minhaTabela'), 'asc', 1)">COD PEDIDO</th>
                        <th>ORDEM ENTREGA</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidosCarga as $pedido)

                            <tr class="">
                                <td>{{$pedido->cargas_id}}</td>
                                <td>{{$pedido->codPedido}}</td>
                                <td>{{$pedido->sequenciaEntrega}}</td>

                            </tr>


                    @endForeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<form id='formEditar' action="{{route('editarPessoa')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='idPessoa' name='idPessoa'/>
    <input type="hidden" id='tipoPessoa' name='tipoPessoa'/>
</form>
<form id='formDesativar' action="{{route('desativarPessoa')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='idPessoaDesativar' name='idPessoaDesativar'/>
</form>
<!-- import da ordenação da coluna -->
<script src="{{asset('js/demo/table.js')}}"></script>

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
    var btnDesativar = document.getElementById("desativar");

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

        document.getElementById('idPessoaDesativar').value = id;
        document.getElementById('formDesativar').submit();
    });
</script>


@include('includes.footer')
