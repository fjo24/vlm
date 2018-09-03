@extends('adm.layouts.frame')

@section('titulo', 'Editar contenido home')

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
        {!!Form::model($homes, ['route'=>['quiero.update',$homes->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>''])!!}
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label class="col l12 s12" for="parrafo">
                    Descripción
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
                        {{$homes->descripcion}}
                    </textarea>
                </div>
                <label class="col l12 s12" for="parrafo">
                    Contenido
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
                        {{$homes->contenido}}
                    </textarea>
                </div>
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
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js">
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('select').formSelect();
  });

	CKEDITOR.replace('descripcion');
	CKEDITOR.replace('contenido');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
