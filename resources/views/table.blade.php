@extends('layouts.lay')

@section('content')
<!--Tablas--->
<table id="workers" class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre completo</th>
        <th scope="col">Nombre en sistema</th>
        <th scope="col">Foto</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

@foreach ($worker as $workerE)
        <tr>
        <td>{{$workerE->id}}</td>
            <td>{{$workerE->name}}</td>
            <td>{{$workerE->username}}</td>
        <td><img style="width:2.2rem" class="border rounded-circle" src="{{asset('img/works/1.jpg')}}" alt=""></td>
        <td><button type="button" class="btn btn-danger rounded-circle mr-4 px-3"><i class="fas fa-users" aria-hidden="true"></i></button><button type="button" class="btn btn-danger px-3 ml-4"><i class="fas fa-users" aria-hidden="true"></i></button></td>
        </tr>
@endforeach
    </tbody>
  </table>



@endsection
