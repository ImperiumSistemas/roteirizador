@include('includes.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTAGEM PARAMETRO</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIÇÃO</th>
                        <th>VALOR</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($parametros as $parametro)
                            <tr>
                                <td>{{$parametro->idParametro}}</td>
                                <td>{{$parametro->descricaoParametro}}</td>
                                <td>{{$parametro->valor}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('includes.footer')
