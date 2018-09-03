@extends('adm.layouts.frame')

@section('titulo', 'Listado de imagenes de '.$producto->nombre)

@section('contenido')
        @if(count($errors) > 0)
        <div class="col s12 card-panel red lighten-4 red-text text-darken-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!!$error!!}</li>
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
            <div class="row">
                {!!Form::open(['route'=>['imgproducto.nueva', $producto->id], 'method'=>'POST', 'files' => true])!!}
                <div class="row">
                    <div class="btn col l6 s12">
                        <input type="file" name="file[]" multiple="true">
                        {!!Form::label('Agregue imagenes:')!!}
                    </div>
                </div>
                <div class="col s12 no-padding">
                    <button class="boton btn-large right" name="action" type="submit">
                Agregar
            </button>
                </div>
            
            {!!Form::close()!!} 
         
            </div>
            <div class="col s12">
                <table class="highlight bordered">
                    <thead>
                        <th>Imagen</th>
                        <th class="text-right">Borrar</th>
                    </thead>
                    <tbody>
                    @foreach($imagenes as $imagen)
                        <tr>
                            <td><img src="{{ asset($imagen->imagen) }}" alt="seccion" width="300" height="300"/></td>
                            <td class="text-right">
                                   {!!Form::open(['class'=>'en-linea', 'route'=>['imgproducto.destroy', $imagen->id], 'method' => 'DELETE'])!!}
                                    <button onclick="return confirm('¿Realmente deseas borrar la imagen?')" type="submit" class="submit-button">
                                        <i class="material-icons red-text">cancel</i>
                                    </button>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>                
            </div>
        </div>

<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection