@extends('adm.layouts.frame')

@section('titulo', 'Catalogo de productos')

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
        {!!Form::open(['route'=>'catalogos.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="file-field input-field col l6 s12">
            <div class="btn">
                <span>
                    Catalogo
                </span>
                {!! Form::file('pdf') !!}
            </div>
            <div class="file-path-wrapper">
                {!! Form::text('pdf',null, ['class'=>'file-path']) !!}
            </div>
        </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light pink right" name="action" type="submit">
                Crear
                <i class="material-icons right">
                    send
                </i>
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
