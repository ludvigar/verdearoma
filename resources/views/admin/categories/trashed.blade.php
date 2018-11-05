@extends('admin.app')

@section('content')

<div id="content">
  <div  id="content-header">
    <div id="breadcrumb">
      <a href="{{ route ('admin.dashboard') }}" title="Panel de Control" class="tip-bottom"></i> Panel de Control</a><a href="{{ route ('admin.categories.index') }}" title="Panel de Control" class="tip-bottom"></i> Categorías</a><a class="current"> Papelera de Categorías</a>
    </div>
    <div class="col-sm-6">
      <h1> Papelera de Categorías</h1>
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Categorías en Papelera</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-responsive table-hover data-table" style="width:100%">
              <thead>
                <tr>
                  <th style="text-align: left;">id</th>
                  <th style="text-align: left;">Título</th>
                  <th style="text-align: left;">Descripción</th>
                  <th style="text-align: left;">slug</th>
                  <th style="text-align: left;">Eliminada</th>
                  <th class="span1" style="text-align: center;"></th>
                  <th class="span1" style="text-align: center;"></th>
                  <th class="span1" style="text-align: center;"></th>
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
                  <td>{{$category->deleted_at}}</td>
                  <td></td>
                  <td style="text-align: center;"><a class="icon-reply tip-bottom" href="
                    {{route('admin.categories.restore', $category->slug)}}" title="Restaurar">
                  </td>
                  <td style="text-align: center;"><a class="icon-remove tip-bottom" href="
                    {{route('admin.categories.delete', $category->slug)}}" title="Eliminar" onclick="return confirm('Estás a punto de eliminar la categoría  {{ $category->title }} permanentemente. Para continuar clic en Aceptar.')">
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

@endsection

@section('scripts')

<script src="{{asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{asset('js/matrix.tables.js') }}"></script>

@endsection