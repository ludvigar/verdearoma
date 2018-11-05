@extends('admin.app')

@section('content')

<section>
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb">
        <a href="{{ route ('admin.dashboard') }}" title="Inicio" class="tip-bottom"><i class="icon-home"></i> Panel de Control</a> <a class="current">Categorías</a>
      </div>
      <div class="col-sm-6">
        <h1>Categorías</h1>
      </div>
    </div>
    <div class="col-sm-12">
      @if (session()->has('message'))
      <div class="alert alert-success">
        {{session('message')}}
      </div>
      @endif
    </div>
    <div class="container-fluid">
      <hr>
   {{--  <div class="pull-right btn-toolbar mb-2 mb-md-0">
      <a href="{{ route ('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">
        Agregar Categoría
      </a>
    </div> --}}
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Categorías</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-responsive table-hover data-table" style="width:100%">
              <thead>
                <tr>
                  <th style="text-align: left;">id</th>
                  <th style="text-align: left;">Título</th>
                  <th style="text-align: left;">Descripción</th>
                  <th style="text-align: left;">slug</th>
                  <th style="text-align: left;">Creada/Eliminada</th>
                  <th style="text-align: center; width: .5em;"></th>
                  <th style="text-align: center; width: .5em;"></th>
                  <th style="text-align: center; width: .5em;"></th>
                </tr>
              </thead>
              <tbody>
                @if($categories->count() > 0)
                @foreach($categories as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->title}}</td>
                  <td>{{$category->description}}</td>
                  <td>{{$category->slug}}</td>

                  @if($category->trashed())
                  <td>{{$category->updated_at}}</td>
                  @else
                  <td>{{$category->created_at}}</td>
                  @endif 
                    
                  <td style="text-align: center;"><a class="icon-edit" href="
                    {{ route('admin.categories.edit', $category->slug)}}">
                  </td>
                  <td style="text-align: center;"><a class="icon-trash" href="{{route('admin.categories.trash', $category->slug)}}" onclick="return confirm('Estás a punto de enviar a la papelera la categoría {{ $category->title }}. Para continuar clic en Aceptar.')">
                  </td>
                  <td style="text-align: center;"><a class="icon-remove" href="{{route('admin.categories.delete', $category->slug)}}" onclick="return confirm('Estás a punto de eliminar   {{ $category->title }} permanentemente. Para continuar clic en Aceptar.')">
                  </td>
                </tr>

                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

@endsection

@section('scripts')

<script src="{{asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{asset('js/matrix.tables.js') }}"></script>

@endsection