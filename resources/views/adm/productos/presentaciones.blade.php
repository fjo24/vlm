@extends('adm.layouts.frame')

@section('titulo', 'Presentacion de productos')

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
<h5>Presentaciones | {!!$producto->nombre!!}</h5>
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Codigo
                </th>
                <th>
                    Precio 1
                </th>
                <th>
                    Precio 2
                </th>
                <th>
                    Precio 3
                </th>
                <th class="text-right">
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($producto->modelos as $modelo)
                <tr>
                    <td>
                        {!!$modelo->nombre!!}
                    </td>
                    <td>
                        {!!$modelo->pivot->codigo!!}
                    </td>
                    <td>
                        {!!$modelo->pivot->precio1!!}
                    </td>
                    <td>
                        {!!$modelo->pivot->precio2!!}
                    </td>
                    <td>
                        {!!$modelo->pivot->precio3!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('editpresentacion', ['id' => $producto->id,'modelo' => $modelo->pivot->modelo_id] )}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['destroypresentacion', $producto->id, $modelo->pivot->modelo_id], 'method' => 'DELETE'])!!}
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
        <a href="newpresentacion">
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
