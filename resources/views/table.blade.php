@extends('layouts.lay')

@section('content')
<div class="card mb-4 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

      <h4 class="mb-2 mb-sm-0 pt-1">
        <a href="/resumen" target="_blank">Administrador</a>
        <span>/</span>
        <span>Trabajadores</span>
      </h4>
    </div>
  </div>
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
        <td><img style="width:2.2rem" class="border rounded-circle" src="{{asset('public/images/'.$workerE->photo)}}" alt=""></td>
        <td>
        <a href="deleteWorker/{{$workerE->id}}"><button type="button" class="btn btn-danger rounded-circle px-3 ml-4"><i class="fas fa-trash" aria-hidden="true"></i>
        </button></a>
        </td>
        </tr>
@endforeach
    </tbody>
  </table>
  <form method="POST" action="/imageUpload"  role="form"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="width:80%;margin-left:10%">
        <div class="d-flex p-2 justify-content-center ">
<div style="width:90%; margin-bottom:-5%" class=" d-flex p-2  z-depth-2 blue darken-3 text-white  color-block justify-content-center"><h5 style="margin-top:2%; margin-bottom:2%">Agregar nuevo trabajador</h5></div>
</div><div class="border primary-border" style="width:100%; padding-top:5%"><div class="modal-body">
<div style="width:80%; margin-left:10%">
    <!-- Material input name -->
    <div class="md-form form-sm">
        <i class="fas fa-user prefix"></i>
      <input type="text" id="materialFormNameModalEx1" name="name" class="form-control form-control-sm" >
      <label for="materialFormNameModalEx1">Nombre completo </label>
    </div>

    <!-- Material input email -->
    <div class="md-form form-sm">
        <i class="fas fa-user-tag prefix"></i>
      <input type="text" id="materialFormEmailModalEx1" name ="username" class="form-control form-control-sm">
      <label for="materialFormEmailModalEx1">Nombre de usuario</label>
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="image" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>


</div>
    <div class="text-center mt-4 mb-2" style="width:50%">
      <button class="btn blue text-white" style="margin-left:50%;width:100%">Crear nuevo registro
        <i class="fa fa-send ml-2"></i>
      </button>
    </div>

  </div></div>


    </div>
  </form>


@endsection
