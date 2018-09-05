@extends('adm.layouts.frame')

@section('titulo', 'Editar metadato de ' .$metadato->seccion)

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
			{!!Form::model($metadato, ['route'=>['metadatos.update',$metadato->id], 'method'=>'PUT', 'files' => true])!!}	
				<div class="row">
					<div class="input-field col l6 s12">
						{!! Form::label('keywords', 'Keywords'  )!!}
						{!! Form::text('keywords', $metadato->keywords, ['class' => '', 'placeholder' => 'Aquí puede escribir palabras claves sobre esta sección'])!!}
					</div>
					
					<div class="input-field col l6 s12">
						{!!Form::label('description', 'Descripción')!!}
						{!! Form::text('description', $metadato->description, ['class' => '', 'required'])!!}
					</div>
					
				</div>
				<div class="col l12 s12 no-padding">
                    <button class="btn-large waves-effect waves-light red right" name="action" type="submit">
                        Editar
                        <i class="material-icons right">
                            send
                        </i>
                    </button>
                </div>
			{!!Form::close()!!} 
			</div>
		</div>
@endsection