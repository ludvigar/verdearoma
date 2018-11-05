@extends('admin.app')

@include('admin.partials.navbar')

@section('content')

<div id="content">
	<div id="content-header">
		<div id="breadcrumb">
			<a href="{{ route ('admin.dashboard') }}" title="Panel de Control" class="tip-bottom"></i> Panel de Control</a> <a href="{{ route ('admin.categories.index') }}" title="Categorías" class="tip-bottom"> Categorías</a><a class="current"> Edición de Categoría</a>
		</div>
		<h1>Edición de Categoría</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-content">
					<div class="control-group">

						<form action="{{ route('admin.categories.update', $category) }}" method="post" accept-charset="utf-8">
							{{ csrf_field() }}
							@method('PUT')
							
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
								<label class="control-label">Nombre de la Categoría :</label>
								<div class="controls">
									<input type="text" name="title" id="txturl" value="{{ $category->title }}" class="span12" placeholder="Nombre" />
									<p class="small">{{config('app.url').'/'}}<span id="url">{{ $category->slug }}</span></p>
									<input type="hidden" name="slug" id="slug" value="{{ $category->slug }}">
								</div>
							</div>
							<div class="control-group">
								<label class="form-control-label">Descripción: </label>
								<textarea name="description" class="textarea_editor span12" rows="6" placeholder="Descripción ...">{{ $category->description }}</textarea>
							</div>
							<div class="col-sm-12">
								<input type="submit" name="submit" class="btn btn-sm btn-outline-secondary" value="Guardar Cambios" />
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{asset('js/bootstrap-wysihtml5.js') }}"></script>

<script>
	$('.textarea_editor').wysihtml5();
</script>

<script>

	$('#txturl').on('keyup', function () {
		var url = slugify($(this).val());
		$('#url').html(url);
		$('#slug').val(url);
		console.log(url);
	});

</script>

@endsection