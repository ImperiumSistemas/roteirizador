@include('includes.header')

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
                 
                           <!-- <th><input type="text" id="txtColuna1"/></th>
                            <th><input type="text" id="txtColuna2"/></th>
                            <th><input type="text" id="txtColuna3"/></th>-->
                                
                <table class="table" id="minhaTabela">
                    <thead>
                        <tr>
                            <th><input type="text" id="txtColuna1"/><br>ID PESSOA</th>
                            <th onclick="sortTable(document.getElementById('minhaTabela'), 'asc', 1)"><input type="text" id="txtColuna2"/><br>NOME</th>
                            <th><input type="text" id="txtColuna3"/><br>ID ClIENTE</th>
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
    $(function () {
        $("#minhaTabela input").keyup(function () {
            var index = $(this).parent().index();
            var nth = "#minhaTabela td:nth-child(" + (index + 1).toString() + ")";
            var valor = $(this).val().toUpperCase();
            $("#minhaTabela tbody tr").show();
            $(nth).each(function () {
                if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                    $(this).parent().hide();
                }
            });
        });

        $("#minhaTabela input").blur(function () {
            $(this).val("");
        });
    });


</script>




<script>
    function sortTable(table, dir, n) {
        var rows, switching, i, x, y, shouldSwitch, switchcount = 0;
        switching = true;
        /*Faça um loop que continuará até
         nenhuma troca foi feita:*/
        while (switching) {
            //comece dizendo: nenhuma troca é feita:
            switching = false;
            rows = table.rows;
            /*Faça um loop por todas as linhas da tabela (exceto o
             primeiro, que contém cabeçalhos da tabela):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //comece dizendo que não deve haver alternância:
                shouldSwitch = false;
                /*Obtenha os dois elementos que você deseja comparar,
                 um da linha atual e o outro da próxima:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /*verifique se as duas linhas devem mudar de lugar,
                 com base na direção, asc ou desc:*/
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //Nesse caso, marque como uma opção e interrompa o loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //Nesse caso, marque como uma opção e interrompa o loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /*Se um interruptor foi marcado, faça-o
                 e marque que uma troca foi feita:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Cada vez que uma troca for concluída, aumente essa contagem em 1:
                switchcount++;
            } else {
                /*Se nenhuma mudança foi feita E a direção for "asc",
                 defina a direção para "desc" e execute o loop while novamente.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }

    var minhaTabela = document.getElementById('minhaTabela');
    sortTable(minhaTabela, 'asc', 0);

//Button click:
    let ord = false;
    document.getElementById("button1").onclick = function () {
        if (!ord) {
            sortTable(minhaTabela, 'asc', 0);
            //sortTable(minhaTabela, 'asc', 1);
            ord = true;
        } else {
            sortTable(minhaTabela, 'desc', 0);
            //sortTable(minhaTabela, 'desc', 1);
            ord = false;
        }
    }

</script>




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
