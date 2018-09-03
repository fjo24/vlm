@extends('adm.layouts.frame')

@section('titulo', 'Listado de destacados')

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
                <th class="hide-on-med-and-down">
                	Imagen
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Orden
                </th>
                <th class="text-right">
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($destacados as $destacado)
                <tr>
                    <td class="hide-on-med-and-down"><img src="{{ asset($destacado->imagen) }}" alt="seccion" width="200" height="150"/>
                    </td>
                    <td>
                        {!!$destacado->nombre!!}
                    </td>
                    <td>
                        {!!$destacado->orden!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('destacadosh.edit',$destacado->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
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
