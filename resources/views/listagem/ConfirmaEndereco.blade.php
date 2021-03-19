@include('includes.header')
<style>


    /**Cor quando passar por cima**/
    #minhaTabela tr:hover td {
        background-color: #feffb7;
    }

    /**Cor quando selecionado**/
    #minhaTabela tr.selecionado td {
        background-color: #aff7ff;
    }

    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {display: inline;}

    ul.pagination li span {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    ul.pagination li span.active {
        background-color: #eee;
        color: black;
        border: 1px solid #ddd;
    }

    ul.pagination li span:hover:not(.active) {background-color: #ddd;}

    ul.pagination li a {
        background-color: #eee;
        color: black;
        border: 1px solid #ddd;
    }

    ul.pagination li a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        font-size: 18px;
    }

</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CONFIRMA ENDEREÇO</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary">Filiais</h6>-->
            <div class="row">
                <form class="" method="post" action="{{route('listagem.confirmaEnderecoFiltro')}}">
                    {{ csrf_field() }}

                    @include('formularios.formularioFiltroConfirmaEndereco')
                    <div align="middle">
                        <p class="mb-4"></p>
                        <p class="mb-4"></p>
                        <button class="btn btn-success btn-icon-split-lg">FILTRAR</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="minhaTabela">
                    <thead>
                    <tr>
                        <th>ID PESSOA</th>
                        <th>NOME</th>
                        <th>ID ClIENTE</th>
                        <th>CONFIRMAR ENDEREÇO</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($listagens as $listagem)

                        <tr>
                            <td>{{$listagem->idPessoa}}</td>
                            <td>{{$listagem->nomePessoa}}</td>
                            <td>{{$listagem->idCliente}}</td>
                            <td>
                                <a style="background-color: darkblue" class="btn"
                                   href="{{route('confirmarEnderecoMapa', $listagem->idPessoa)}}">CONFIRMAR
                                    ENDEREÇO</a>
                            </td>
                        </tr>

                    @endForeach
                    </tbody>
                </table>
            </div>


            {{$listagens->links()}}

        </div>
    </div>

</div>


<script>
    var tabela = document.getElementById("minhaTabela");
    var linhas = tabela.getElementsByTagName("tr");

    for (var i = 0; i < linhas.length; i++) {
        var linha = linhas[i];
        linha.addEventListener("click", function () {
            //Adicionar ao atual
            //selLinha(this, false); //Selecione apenas um
            selLinha(this, true); //Selecione quantos quiser
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

    var btnVisualizar = document.getElementById("visualizarDados");

    btnVisualizar.addEventListener("click", function () {
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se eestá selecionado
        if (selecionados.length < 1) {
            alert("Selecione pelo menos uma linha");
            return false;
        }

        var dados = "";

        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
            dados += "ID PESSOA: " + selecionado[0].innerHTML + " - Nome: " + selecionado[1].innerHTML + " - ID ClIENTE: " + selecionado[2].innerHTML + "\n";
        }

        alert(dados);
    });
</script>

@include('includes.footer')
