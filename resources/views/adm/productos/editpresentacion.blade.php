@extends('adm.layouts.frame')

@section('titulo', 'Editar Presentacion')

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
    {!!Form::model($model, ['route'=>['updatepresentacion',$producto->id, $model->id], 'method'=>'PUT', 'files' => true])!!}

        <div class="row">
            <div class="file-field input-field col l6 m6 s12">
                {!!Form::label('Codigo:')!!}
                {!!Form::text('codigo', $model->pivot->codigo, ['class'=>''])!!}
            </div>
            <div class="input-field col l6 m6 s12">
                {!!Form::label('Precio 1:')!!}
                {!!Form::text('precio1', $model->pivot->precio1, ['class'=>''])!!}
            </div>
            <div class="input-field col l6 m6 s12">
                {!!Form::label('Precio 2:')!!}
                {!!Form::text('precio2', $model->pivot->precio2, ['class'=>''])!!}
            </div>
            <div class="input-field col l6 m6 s12">
                {!!Form::label('Precio 3:')!!}
                {!!Form::text('precio3', $model->pivot->precio3, ['class'=>''])!!}
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

</script>
@endsection
