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
        {!!Form::model($producto, ['route'=>['productos.update',$producto->id], 'method'=>'PUT', 'files' => true])!!}   
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Precio:')!!}
                        {!!Form::text('precio', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
            {!! Form::label('Sistema') !!}<br />
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Sistema', 'required']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('rubros') !!}<br />
                {!! Form::select('rubros[]', $rubros, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('Aplicaciones') !!}<br />
                {!! Form::select('aplicaciones[]', $aplicaciones, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('modelos') !!}<br />
                {!! Form::select('modelos[]', $modelos, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('categoria_pregunta_id', $categoria_preguntas, null, ['class' => 'form-control', 'placeholder' => 'Categoria de preguntas']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('visible', ['publico' => 'publico', 'privado' => 'privado', 'ambos' => 'ambos'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione visibilidad']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('tipo', ['novedad' => 'novedad', 'oferta' => 'oferta', 'ninguna' => 'ninguna'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de producto']) !!}
            </div>

            <div class="input-field col l6 s12">
                {!! Form::select('iva', ['21' => '21%', '10.5' => '10,5%'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione iva para producto']) !!}
            </div>
            <div class="input-field col l6 s12">
                <label>Aplica para descuento?</label>
                <br>
<p>
      <label>
        <input class="with-gap" name="aplica_desc" type="radio" value="1" @if($producto->aplica_desc == '1') checked @endif />
        <span>Si</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="aplica_desc" type="radio" value="0" @if($producto->aplica_desc == '0') checked @endif />
        <span>No</span>
      </label>
    </p>
            </div>
        </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Manual
                    </span>
                    {!! Form::file('manual') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('manual',null, ['class'=>'file-path']) !!}
                </div>
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Despiece
                    </span>
                    {!! Form::file('despiece') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('despiece',null, ['class'=>'file-path']) !!}
                </div>
            </div>
       <label class="col l12 s12" for="descripcion">
            Descripcion
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">{!! $producto->descripcion !!}
            </textarea>
        </div>
        <label class="col l12 s12" for="contenido">
            Contenido
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
                {!! $producto->contenido !!}
            </textarea>
        </div>
        <label class="col l12 s12" for="ventajas">
            Ventajas
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="ventajas" name="ventajas" required="">
                {!! $producto->ventajas !!}
            </textarea>
        </div>
        <label class="col l12 s12" for="caracteristicas">
            Caracteristicas
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="caracteristicas" name="caracteristicas" required="">
                {!! $producto->caracteristicas !!}
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
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
    CKEDITOR.replace('ventajas');
    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('contenido');
    CKEDITOR.replace('caracteristicas');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
