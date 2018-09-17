@extends('adm.layouts.frame')

@section('titulo', 'Editar Distribuidor')

@section('contenido')
		@if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
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
        {!!Form::model($distribuidor, ['route'=>['distribuidores.update',$distribuidor->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
                <div class="input-field col s12">

                                    {!! Form::label('Nombre *') !!}

                                    {!! Form::text('name', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Apellido *') !!}

                                    {!! Form::text('apellido', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Username') !!}

                                    {!! Form::text('username', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>


                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Correo electrónico *') !!}

                                    {!! Form::email('email', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Contraseña *') !!}

                                    {!! Form::password('password', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Razón social *') !!}

                                    {!! Form::text('social', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('CUIT *') !!}

                                    {!! Form::text('cuit', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Teléfono *') !!}

                                    {!! Form::text('telefono', null, ['class'=>'', 'required']) !!}

                                </div>

                            </div>
                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Dirección') !!}

                                    {!! Form::text('direccion', null, ['class'=>'']) !!}

                                </div>

                            </div>

                            <div class="row">

                                <div class="input-field col s12">

                                    {!! Form::label('Código postal') !!}

                                    {!! Form::text('postal', null, ['class'=>'']) !!}

                                </div>

                            </div>

                            <div class="input-field col l12 s12">
                {!! Form::select('activo', ['1' => 'activo', '0' => 'inactivo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Estado']) !!}
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('select').formSelect();
  });

</script>
@endsection