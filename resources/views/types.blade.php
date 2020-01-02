@extends('layouts.lay')

@section('content')
<!--Tablas--->
<table id="workers" class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre </th>
        <th scope="col">Precio</th>
        <th scope="col">Foto</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

@foreach ($types as $typesE)
        <tr>
        <td>{{$typesE->id}}</td>
            <td>{{$typesE->name}}</td>
            <td>{{$typesE->price}}</td>
        <td><img style="width:2.2rem" class="border rounded-circle" src="{{asset('public/images/'.$typesE->photo)}}" alt=""></td>
        <td>
        <a href="deleteType/{{$typesE->id}}"><button type="button" class="btn btn-danger rounded-circle px-3 ml-4"><i class="fas fa-trash" aria-hidden="true"></i>
        </button></a>
        </td>
        </tr>
@endforeach
    </tbody>
  </table>
  <form method="POST" action="/typeUpload"  role="form"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="width:80%;margin-left:10%">
        <div class="d-flex p-2 justify-content-center ">
<div style="width:90%; margin-bottom:-5%" class=" d-flex p-2  z-depth-2 blue darken-3 text-white  color-block justify-content-center"><h5 style="margin-top:2%; margin-bottom:2%">Agregar nuevo tipo de corte</h5></div>
</div><div class="border primary-border" style="width:100%; padding-top:5%"><div class="modal-body">
<div style="width:80%; margin-left:10%">
    <!-- Material input name -->
    <div class="md-form form-sm">
      <i class="fa fa-envelope prefix"></i>
      <input type="text" id="materialFormNameModalEx1" name="name" class="form-control form-control-sm" >
      <label for="materialFormNameModalEx1">Nombre</label>
    </div>

    <!-- Material input email -->
    <div class="md-form form-sm">
      <i class="fa fa-lock prefix"></i>
      <input type="text" id="materialFormEmailModalEx1" name ="price" class="form-control form-control-sm">
      <label for="materialFormEmailModalEx1">Precio</label>
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
