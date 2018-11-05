@extends('admin.app')



@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{ route ('admin.dashboard') }}" title="Panel de Control" class="tip-bottom"></i> Panel de Control</a><a class="current"> Productos</a>
    </div>
    <div class="col-sm-6">
      <h1>Productos</h1>
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
            <h5>Productos</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-responsive table-hover data-table" style="width:100%">
              <thead>
                <tr>
                  <th style="text-align: left;">id</th>
                  <th style="text-align: left;">Nombre</th>
                  <th style="text-align: left;">Descripción</th>
                 {{--  <th style="text-align: left;">slug</th> --}}
                  <th style="text-align: center;">Thumbnail</th>
                  
                  <th style="text-align: center;">Categoría</th>
                  <th style="text-align: left;">Creada/Actualizada</th>
                  <th class="span1" style="text-align: center;"></th>
                  <th class="span1" style="text-align: center;"></th>
                  <th class="span1" style="text-align: center;"></th>
                  <th class="span1" style="text-align: center;"></th>
                </tr>
              </thead>
              <tbody>
                @if($products->count() > 0)
                @foreach($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->description}}</td>
                  {{-- <td>{{$product->slug}}</td> --}}
                  <td style="text-align: center;"><img src="{{asset('storage/'.$product->thumbnail)}}" class="img-responsive" height="50"/></td>
                  <td style="text-align: center;">{{$product->category_id}}</td>
                  <td>{{$product->updated_at}}</td>
                  <td style="text-align: center;"><a class="icon- icon-zoom-in tip-bottom" href="
                    {{ route('admin.products.detail', $product->slug)}}" title="Detalle">
                  </td>
                  <td style="text-align: center;"><a class="icon-edit tip-bottom" href="
                    {{ route('admin.products.edit', $product->slug)}}" title="Editar">
                  </td>
                  <td style="text-align: center;"><a class="icon-trash tip-bottom" href="{{route('admin.products.trash', $product->slug)}}" title="A papelera" onclick="return confirm('Estás a punto de enviar a la papelera la categoría {{ $product->name }}. Para continuar clic en Aceptar.')">
                  </td>
                  <td style="text-align: center;"><a class="icon-remove tip-bottom" href="{{route('admin.products.delete', $product->slug)}}" title="Eliminar" onclick="return confirm('Estás a punto de eliminar la categoría  {{ $product->name }} permanentemente. Para continuar clic en Aceptar.')">
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