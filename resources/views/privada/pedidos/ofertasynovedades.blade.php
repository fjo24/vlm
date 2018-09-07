@extends('privada.templates.body')

@section('titulo', 'VLM')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 70%;">
    <div class="ofertaynovedad">OFERTAS Y NOVEDADES</div>
    <div class="row">
        <div class="galeria col l12 m12 s12">
            @foreach($productos as $prod)
            @if($prod->visible!='privado')
            <a href="{{ route('productoinfo', $prod->id)}}">
                <div class="col l4 m12 s12 oyn">
                    @foreach($prod->imagenes as $img)
                    <div class="efecto">
                        <span class="central">
                        @if($prod->tipo=='novedad')
                            <img class="responsive-img" src="{{ asset('img/nuevo.png') }}"/> 
                        @else
                            <img class="responsive-img" src="{{ asset('img/oferta.png') }}"/> 
                        @endif
                        </span>
                    </div>
                    <div class="im">
                    <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                    </div>
                    <h2 class="center">
                        {{ $prod->nombre }}
                    </h2>
                    @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                </div>
            </a>
        @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('js')
<script class="init" type="text/javascript">
    /*$(document).ready(function() {
    $('#example').DataTable();
} );*/
$(document).ready(function(){
    $("#formpedido").on("change", "input:checkbox", function(){
        $("#formpedido").submit();
    });
});
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
@endsection
