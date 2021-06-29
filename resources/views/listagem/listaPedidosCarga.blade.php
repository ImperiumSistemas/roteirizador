@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM PEDIDOS CARGA</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('listaCargas')}}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                <span class="text">GERENCIADOR DE CARGAS</span>
            </a>
            <button class="btn btn-primary btn-primary" id="listarPedidos">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-pencil-ruler"></i>
                            <span class="text">Listar Produtos</span>
                        </span>
            </button>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="minhaTabela">
                    <thead>
                    <tr>
                        <th>ID CARGA</th>
                        <th onclick="sortTable(document.getElementById('minhaTabela'), 'asc', 1)">COD PEDIDO</th>
                        <th>ORDEM ENTREGA</th>
                        <th>PESO</th>
                        <th>CUBAGEM</th>
                        <th>VALOR</th>
                        <th>NOME CLIENTE</th>
                        <th>PRAÇA</th>
                        <th>AÇÃO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidosCarga as $pedido)
                        <tr class="">
                            <td>{{$pedido->cargas_id}}</td>
                            <td>{{$pedido->codPedido}}</td>
                            <td>{{$pedido->sequenciaEntrega}}</td>
                            <td>{{$pedido->peso}}</td>
                            <td>{{$pedido->cubagem}}</td>
                            <td>{{$pedido->valorPedido}}</td>
                            <td>{{$pedido->nome}}</td>
                            <td>{{$pedido->praca}}</td>
                            <td>
                                <a class="btn deep-orange" href="{{route('removerPedidoCarga', $pedido->codPedido)}}">Remover Pedido</a>
                            </td>
                        </tr>
                    @endForeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<form id='formProdutos' action="{{route('listarProdutosPedido')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id='codPedido' name='codPedido'/>
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

    var btnListarPedidos = document.getElementById("listarPedidos");


    btnListarPedidos.addEventListener("click", function () {
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
        let id = selecionado[1].innerHTML;

        document.getElementById('codPedido').value = id;
        document.getElementById('formProdutos').submit();
    });



</script>


@include('includes.footer')
