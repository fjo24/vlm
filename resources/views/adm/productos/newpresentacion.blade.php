@extends('adm.layouts.frame')

@section('titulo', 'Nueva Presentacion')

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
    {!!Form::model($producto, ['route'=>['storepresentacion',$producto->id], 'method'=>'PUT', 'files' => true])!!}

        <div class="row">
            <div class="file-field input-field col l6 m6 s12">
                {!! Form::select('modelo_id', $modelos, null, ['class' => 'form-control', 'placeholder' => 'Presentacion', 'required']) !!}
            </div>
            <div class="file-field input-field col l6 m6 s12">
                {!!Form::label('Codigo:')!!}
                {!!Form::text('codigo', null, ['class'=>''])!!}
            </div>
            <div class="input-field col l4 m4 s12">
                {!!Form::label('Precio 1:')!!}
                {!!Form::text('precio1', null, ['class'=>''])!!}
            </div>
            <div class="input-field col l4 m4 s12">
                {!!Form::label('Precio 2:')!!}
                {!!Form::text('precio2', null, ['class'=>''])!!}
            </div>
            <div class="input-field col l4 m4 s12">
                {!!Form::label('Precio 3:')!!}
                {!!Form::text('precio3', null, ['class'=>''])!!}
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light right" name="action" type="submit">
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
