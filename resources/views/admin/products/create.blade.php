@extends('admin.app')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route ('admin.dashboard') }}" title="Inicio" class="tip-bottom"><i class="icon-home"></i> Panel de Control</a> <a href="{{ route ('admin.products.index') }}" class="tip-bottom">Productos</a> <a class="current"> Agregar Producto</a>
    </div>
    <h1>Agregar Producto</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <form action="{{ route('admin.products.store') }}" method="put" accept-charset="utf-8" >
        <div class="span8">
          <div class="widget-box">
            <div class="widget-content"> 
              <div class="control-group">
                @csrf
                <div class="col-sm-12">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                </div>
                <div class="col-sm-12">
                  @if (session()->has('message'))
                  <div class="alert alert-success">
                    {{session('message')}}
                  </div>
                  @endif
                </div>
                <div class="control-group">
                  <div class="span6">
                    <label class="control-label">Nombre del Producto: </label>
                    <input type="text" name="title" id="txturl" class="span12" placeholder="Nombre" />
                    <p class="small">{{config('app.url').'/'}}<span id="url"></span></p>
                    <input type="hidden" name="slug" id="slug">
                  </div>

                  <div class="span6">
                    <label class="control-label">Título del Producto: </label>
                    <input type="text" name="title" id="" class="span12" placeholder="Título" />  
                  </div>
                </div>

                <div class="control-group">
                  <label class="span12 form-control-label">Descripción: </label>
                  <div class="controls">
                    <textarea name="description" class="span12" rows="6" placeholder="Descripción ..."></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <div class="span4">
                    <label class="control-label">Categoría: </label>
                    <select name="category_id" id="select2" class="form-control">
                      @if($categories->count() > 0)
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="span4">
                    <label class="control-label">Grupo de fragancias: </label>
                    <select name="category_id" id="select2" class="form-control">
                      @if($categories->count() > 0)
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="span4">
                    <label class="control-label">Status: </label>
                    <select class="form-control" id="status" name="status">
                      <option value="0" >Pendiente</option>
                      <option value="1" >Publicado</option>
                    </select>
                  </div>

                  <div class="control-group">
                    <div class="span4">
                      <label class="control-label">Precio: </label>
                      <input type="text" name="title" class="span12" placeholder="Precio" />  
                    </div>
                  </div>
                  <div class="span4">
                    <label class="control-label">Descuento: </label>
                    <select class="form-control" id="status" name="discount">
                      <option value="0" >No</option>
                      <option value="1" >Sí</option>
                    </select>
                  </div>
                  <div class="span4">
                    <label class="control-label">Opciones: </label>
                    <select class="form-control" id="status" name="status">
                      <option value="0" >Sin Opciones</option>
                      <option value="1" >Pack</option>
                    </select>
                  </div>
                  
                </div>

               {{--  <div class="col-sm-12">
                  <input type="submit" name="submit" class="btn btn-sm btn-outline-secondary" value="Agregar Producto" />
                </div> --}}

              </div>
            </div>
          </div>
        </div>
        
        <div class="span4">
          <div class="widget-box">
            <div class="widget-content">
              <label class="control-label">Selección de imágenes </label>
              <input type="file" name="file" />
            </div>
          </div>
          <div class="widget-box">
            <div class="widget-content">
              <div class="img-thumbnail  text-center">
                <img src="{{asset('img/no-thumbnail.jpeg')}} id="imgthumbnail" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>


@endsection

@section('scripts')

<script src="{{asset('js/app.js')}}"></script>

<script>

  $('#txturl').on('keyup', function () {
    var url = slugify($(this).val());
    $('#url').html(url);
    $('#slug').val(url);
    console.log(url);
  });

  $('#thumbnail').on('change', function() {
    var file = $(this).get(0).files;
    var reader = new FileReader();
    reader.readAsDataURL(file[0]);
    reader.addEventListener("load", function(e) {
      var image = e.target.result;
      $("#imgthumbnail").attr('src', image);
    });
  });

  
</script>

@endsection