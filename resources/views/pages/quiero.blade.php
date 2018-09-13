@extends('pages.templates.body')
@section('title', 'VLM - Contacto')
@section('css')

<link rel="stylesheet" href="{{ asset('css/pages/contacto.css') }}">
<link href="{{ asset('css/pages/quiero.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet">
@endsection
@section('contenido')
<!-- body -->        
<div class="seccion-banner" style="background: url({!! $banner->imagen !!});">
    <div class="btexto" style="padding-top: 6%!important;">
        <div class="tbanner">
            <i>
                {!! $banner->texto1 !!}
            </i>
        </div>
    </div>
</div>
	<main>
		<section class="contacto">
			<div class="container" style="width: 90%">
				<div class="row">
					<div class="col l12 m12 s12" style="color: black">
						<div class="col l6 m6 s12" style="color: black">
							<div class="izquierda" style="    width: 85%;line-height: 28px;    margin: 5% 0 0 0;">
								
				                <span class="nombre_empresa">
				                    {!! $empresa->nombre !!}
				                </span>
				                <br>
							<span class="descripcion_empresa">
				                {!! $empresa->descripcion !!}
				            </span>
				            <br>
				                    <span class="contenido_empresa">
				                        {!! $empresa->contenido !!}
				                    </span>
				                </br>
				            </br>
							</div>
						</div>
						<div class="col l6 m6 s12 center" style="color: black">
					<div class="col s12 l12">
						{!!Form::open(['route'=>'enviarmailquiero', 'method'=>'POST'])!!}
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
					          		{!!Form::text('empresa',null,['class'=>'', 'placeholder'=>'Empresa'])!!}
					          		<label for="empresa"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::email('email',null,['class'=>'', 'placeholder'=>'Email'])!!}
					          		<label for="email"></label>
					        	</div>
					      	</div>
					      	<div class="row no-margin">
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('localidad',null,['class'=>'', 'placeholder'=>'Localidad'])!!}
					          		<label for="Localidad"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('provincia',null,['class'=>'', 'placeholder'=>'Provincia'])!!}
					          		<label for="provincia"></label>
					        	</div>
					        	<div class="col l12 m12 s12">
					        		
					        	<div class="input-field col l6 m6 s12" style="color: black;padding-left: 0;margin-left: -5%;">
					          		<div class="g-recaptcha" data-sitekey="6LfT-GQUAAAAALDE4kKAhJAYX2I10Ve1PwtaXBQV"></div>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black;padding-left: 10%;">
					          		<p>
								      <label>
								        <input type="checkbox" required="" />
								        <span>Acepto los términos y condiciones de privacidad</span>
								      </label>
								    </p>
					        	</div>
					        	</div>
							    <div class="left col l2 m2 s6">
					        
					        	<br>
							      	<button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: #89B8E6;height: 38px;    width: 100px;color: white;font-weight: 500;    font-family: 'Asap', sans-serif;border-radius: 3px;">Enviar
									</button>
								</div>
					      	</div>
				{!!Form::close()!!}
					</div>
				</div>
			</div>
			</div>
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





