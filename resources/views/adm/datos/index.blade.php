@extends('adm.layouts.frame')

@section('titulo', 'Datos de la empresa')

@section('contenido')
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
	  			@endforeach
	  		</ul>
	  	</div>
		@endif
		@if(session('success'))
		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
			{{ session('success') }}
		</div>
		@endif

		<div class="row">
			<div class="col s12">
				<table class="highlight bordered">
					<thead>
						<td>Tipo</td>
						<td>Descripción</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($datos as $dato)
						<tr>
							@if($dato->tipo=='email2')
							<td>email pedidos</td>
							@else
							<td>{{ $dato->tipo }}</td>
							@endif
							<td>{{ $dato->descripcion }}</td>
							<td class="text-right">
								<a href="{{ route('datos.edit', $dato->id) }}"><i class="material-icons">create</i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>				
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection