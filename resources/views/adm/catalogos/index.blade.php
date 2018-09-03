@extends('adm.layouts.frame')

@section('titulo', 'Catalogo de productos')

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
                <td>
                    Nombre
                </td>
                <td>
                    PDF
                </td>
                <td class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                @foreach($catalogos as $catalogo)
                <tr>
                    <td>
                        {!!$catalogo->nombre!!}
                    </td>
                    <td>
                        @if(isset($catalogo->pdf))
                                    <a href='{{ route('file-pdf', ['post' => $catalogo->id])}}'> 
                              <img width="20%" src="{{asset('img/pdficon.png')}}" />
                            </a>
                        @else
                            Sin catalogo  
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{ route('catalogos.edit',$catalogo->id)}}">
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
