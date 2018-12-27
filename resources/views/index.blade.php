<!-- Extendendo o layout principal -->
@extends('layout.front')

<!-- Title da página -->
@section('title', 'Unidade')

@section('content')

<div class="card mb-4">
    <div class="card-header" style="padding-top: 50px;">
        
         <!--<form class="form-horizontal" id="form_capa"  name="form_capa" method="post" action="{{ route("buscar")}}" 
               class="needs-validation" novalidate style="padding-top: 15px;"> -->
             <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"> Carros Seminovos</div>
                 <div class="col-md-3">                     
                     <a href="{{ route('buscar') }}" class="btn btn-warning btn-block"><i class="fa fa-search"></i> Buscar</a>
                 </div>
             </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(isset($cars) && count($cars)>0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano Fabricação</th>
                        <th>Ano Modelo</th>
                        <th>Preço</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano Fabricação</th>
                        <th>Ano Modelo</th>
                        <th>Preço</th>
                        <th>Link</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach($cars As $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->marca}}</td>
                            <td>{{$item->modelo}}</td>
                            <td>{{$item->fabricacao}}</td>
                            <td>{{$item->anomod}}</td>
                            <td>{{$item->preco}}</td>
                            <td> 
                                <a href="{{ $item->link }}" target="_blank" title="Mais sobre o veiculo">
                                    Mais informações
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                Não há dados
            @endif
        </div>
    </div>
    @endsection