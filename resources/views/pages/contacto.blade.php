@extends('pages.templates.body')
@section('title', 'VLM - Contacto')
@section('css')

<link rel="stylesheet" href="{{ asset('css/pages/contacto.css') }}">

@endsection
@section('contenido')
<!-- body -->        
   
	<main>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.7720125073506!2d-57.89293964335507!3d-34.86195553241113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a2e447d73a3501%3A0x74b05e21fea7521c!2sVLM+Argentina!5e0!3m2!1ses-419!2sar!4v1536280489171" width="100%" height="402" frameborder="0" style="border:0" allowfullscreen></iframe>
		<section class="contacto">
			<div class="container">
				<div class="row">
				    <div class="col l12 m12 s12 center" style="color: black">
				        <span class="complete">Complete el formulario a continuación y nuestro equipo se contactará a la brevedad</span>
				    </div>
					<div class="col s12 l12">
						{!!Form::open(['route'=>'enviarmailcontacto', 'method'=>'POST'])!!}
						{{ csrf_field() }}
					      	<div class="row">
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('nombre',null,['class'=>'', 'placeholder'=>'Nombre'])!!}
					          		<label for="nombre"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('telefono',null,['class'=>'', 'placeholder'=>'Telefono'])!!}
					          		<label for="telefono"></label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::email('email',null,['class'=>'', 'placeholder'=>'Email'])!!}
					          		<label for="email"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('empresa',null,['class'=>'', 'placeholder'=>'Empresa'])!!}
					          		<label for="empresa"></label>
					        	</div>
					      	</div>
					      	<div class="row no-margin">
					        	<div class="input-field col m6 s12" style="color: black">
			          				<label for="mensaje"></label>
			          				{!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje'])!!}
					        	</div>
							    <div class="col s6">
					        		<div class="g-recaptcha" data-sitekey="6LfT-GQUAAAAALDE4kKAhJAYX2I10Ve1PwtaXBQV" required></div>
					        	<br>
							      	<button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: #89B8E6;height: 38px;    width: 100px;color: white;font-weight: 500;    font-family: 'Asap', sans-serif;border-radius: 3px;">Enviar
									</button>
								</div>
					      	</div>
					</div>
				</div>
				{!!Form::close()!!}
			</div>
	</section>


@endsection

@section('js')
	<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

	<script type="text/javascript">
        $('.logo').click(() => {
            window.location.href = "";
        });
    </script>
@endsection





