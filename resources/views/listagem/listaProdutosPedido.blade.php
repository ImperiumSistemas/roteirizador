@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM PRODUTOS PEDIDO</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('listaCargas')}}" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                <span class="text">GERENCIADOR DE CARGAS</span>
            </a>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="minhaTabela">
                    <thead>
                    <tr>
                        <th>ID PRODUTO</th>
                        <th onclick="sortTable(document.getElementById('minhaTabela'), 'asc', 1)">DESCRIÇÃO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr class="">
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->descricao}}</td>
                        </tr>
                    @endForeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>






@include('includes.footer')
