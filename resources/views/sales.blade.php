@extends('layouts.lay')

@section('content')
<div class="card mb-4 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

      <h4 class="mb-2 mb-sm-0 pt-1">
        <a href="/resumen" target="_blank">Administrador</a>
        <span>/</span>
        <span>Ventas</span>
      </h4>
    </div>
  </div>
<!--Tablas--->
<table id="workers" class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Estilista</th>
        <th scope="col">Tipo de corte</th>
        <th scope="col">Precio</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

@foreach ($sales as $saleE)
        <tr>
        <td>{{$saleE->id}}</td>
            <td>{{$saleE->worker}}</td>
            <td>{{$saleE->sale}}</td>
            <td>{{$saleE->price}}</td>
            <td>{{$saleE->created_at}}</td>
         <td>
        <a href="deleteSale/{{$saleE->id}}"><button type="button" class="btn btn-danger rounded-circle px-3 ml-4"><i class="fas fa-trash" aria-hidden="true"></i>
        </button></a>
        </td>
        </tr>
@endforeach
    </tbody>
  </table>



@endsection
