@extends('adm.layouts.frame')

@section('titulo', 'Listado de productos')

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
        <table class="highlight bordered">
            <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Modelo
                </th>
                <th>
                	Categoria
                </th>
                <th class="center">
                    Administrar imagenes
                </th>
                <th class="text-right">
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>
                        {!!$producto->nombre!!}
                    </td>
                    <td>
                        @foreach($producto->modelos as $modelo)
                            {!!$modelo->codigo!!}
                            @if($ready == 0)    
                                @break;
                            @endif
                        @endforeach
                    </td>
                     <td>
                        {!!$producto->categoria->nombre!!}
                    </td>
                    <td class="center"><a href="{{ route('imgproducto.lista',$producto->id)}}"><i class="material-icons">image</i></a></td>
                    <td class="text-right">
                        <a href="{{ route('productos.edit',$producto->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['productos.destroy', $producto->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm_delete(this);" type="submit">
                            <i class="material-icons red-text">
                                cancel
                            </i>
                        </button>
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a href="{{ route('productos.create') }}">
            <div class="col l12 s12 no-padding" href="">
                <button class="boton btn-large right" name="action" type="submit">
                    Nuevo
                </button>
            </div>
        </a>
    </div>
</div>
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection
