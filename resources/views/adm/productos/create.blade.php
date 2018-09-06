@extends('adm.layouts.frame')

@section('titulo', 'Nuevo producto')

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
    <div class="col l12 s12">
        {!!Form::open(['route'=>'productos.store', 'method'=>'POST', 'files' => true])!!}
        <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Precio:')!!}
                        {!!Form::text('precio', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
            {!! Form::label('Categoria') !!}<br />
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Categoria', 'required']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('modelos') !!}<br />
                {!! Form::select('modelos[]', $modelos, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('productos') !!}<br/>
                {!! Form::select('productos[]', $productos, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
            {!! Form::label('Visibilidad') !!}<br />
                {!! Form::select('visible', ['publico' => 'publico', 'privado' => 'privado', 'ambos' => 'ambos'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione visibilidad']) !!}
            </div>
        <div class="input-field col l6 s12">
        {!! Form::label('Oferta') !!}<br />
            {!! Form::select('oferta', ['promocion' => 'promocion', 'descuento' => 'descuento', 'ninguna' => 'ninguna'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de oferta']) !!}
        </div>
        <div class="input-field col l6 s12">
        {!! Form::label('destacado?') !!}<br />
            {!! Form::select('destacado', ['1' => 'si', '2' => 'no'], null, ['class' => 'form-control', 'placeholder' => 'Producto destacado?']) !!}
        </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
        <label class="col l12 s12" for="descripcion">
            Descripcion
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
            </textarea>
        </div>
        <label class="col l12 s12" for="contenido">
            Contenido
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
            </textarea>
        </div>
        <div class="input-field col l6 s12">
            {!!Form::label('Video:')!!}
            {!!Form::text('video', null , ['class'=>'', ''])!!}
        </div>
        <div class="input-field col l6 s12">
            {!!Form::label('Video titulo:')!!}
            {!!Form::text('video_titulo', null , ['class'=>'', ''])!!}
        </div>
        <label class="col l12 s12" for="video_descripcion">
            Video descripción
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="video_descripcion" name="video_descripcion" required="">
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Crear
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('contenido');
    CKEDITOR.replace('video_descripcion');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
