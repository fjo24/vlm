@extends('adm.layouts.frame')

@section('titulo', 'Crear slider')

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
        {!!Form::open(['route'=>'sliders.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col s6">
                {!!Form::label('Link:')!!}
						{!!Form::text('link', null , ['class'=>''])!!}
            </div>
            <div class="file-field input-field col s6">
                <div class="btn">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen',null, ['class'=>'file-path', 'placeholder' => 'Recomendado (1421 x 561)']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'', 'required'])!!}
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                 <div class="input-field col l6 s12">
                    {!!Form::label('texto:')!!}
                    {!!Form::text('texto', null , ['class'=>''])!!}
                </div>
                <div class="input-field col l6 s12">
                    {!!Form::label('texto2:')!!}
                    {!!Form::text('texto2', null , ['class'=>''])!!}
                </div>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Crear
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
