@extends('admin.app')

@include('admin.partials.navbar')

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
  <div>
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{session('message')}}
    </div>
    @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="container">
      <div class="row-fluid col-md-12">
        
          <div class="col-md-6">
            <h1>col6</h1>
          </div>
          <div class="col-md-6">
            <h1>col6</h1>
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