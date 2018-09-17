@extends('adm.layouts.frame')

@section('titulo', 'Listado de Distribuidores')

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
                    Nombre de usuario
                </th>
                <th>
                    Nombre Completo
                </th>
                <th>
                    Razón Social
                </th>
                <th>
                    Cuit
                </th>
                <th>
                    Telefono
                </th>
                <th>
                    Dirección
                </th>
                <th>
                    Postal
                </th>
                <th>
                	Email
                </th>
                <th class="text-right">
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($distribuidores as $distribuidor)
                <tr>
                    <td>
                        {!!$distribuidor->username!!}
                    </td>
                    <td>
                        {!!$distribuidor->name!!} {!!$distribuidor->apellido!!}
                    </td>
                    <td>
                        {!!$distribuidor->social!!}
                    </td>
                    <td>
                        {!!$distribuidor->cuit!!}
                    </td>
                    <td>
                        {!!$distribuidor->telefono!!}
                    </td>
                    <td>
                        {!!$distribuidor->direccion!!}
                    </td>
                    <td>
                        {!!$distribuidor->postal!!}
                    </td>
                    <td>
                        {!!$distribuidor->email!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('distribuidores.edit',$distribuidor->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['distribuidores.destroy', $distribuidor->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm('¿Realmente deseas borrar al distribuidor?')" type="submit">
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
    </div>
</div>
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection
