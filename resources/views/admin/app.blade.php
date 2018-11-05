<!DOCTYPE html>
<html lang="es">
<head>
<title>Panel de Control</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset ('css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset ('css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset ('css/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset ('css/bootstrap-wysihtml5.css') }}"/>
<link rel="stylesheet" href="{{ asset ('font-awesome/css/font-awesome.css') }}"  />

<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800'>

</head>
<body>

@include('admin.partials.navbar')

@yield('content')

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2018 - <a href="http://verdearoma.com.ar">VERDE AROMA</a> </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/matrix.js')}}"></script>

@yield('scripts')

</body>
</html>