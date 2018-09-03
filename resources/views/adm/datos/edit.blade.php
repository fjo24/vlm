@extends('adm.layouts.frame')

@section('titulo', 'Editar datos de empresa')

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
                {!!Form::model($dato, ['route'=>['datos.update',$dato->id], 'method'=>'PUT', 'files' => true])!!}
                <div class="row">
                    <div class="input-field col s6">
                        {!!Form::label('descripcion',  $dato->tipo )!!}
						{!! Form::text('descripcion', $dato->descripcion, ['class' => '', 'required'])!!}
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
