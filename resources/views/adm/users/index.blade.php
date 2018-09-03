@extends('adm.layouts.frame')

@section('titulo', 'Lista usuarios')

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
						<td>Nombre</td>
						<td>Usuario</td>
						<td>Nivel</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($users as $user)
						<tr>
							<td>{!!$user->name!!}</td>
							<td>{!!$user->username!!}</td>
							<td>{!!$user->nivel!!}</td>
							<td class="text-right">
								<a href="{{ route('users.edit',$user->id)}}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['users.destroy', $user->id], 'method' => 'DELETE'])!!}
									<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
									</button>
								{!!Form::close()!!}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>			
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection