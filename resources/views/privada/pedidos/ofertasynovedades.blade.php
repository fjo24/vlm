@extends('privada.templates.body')

@section('titulo', 'VLM')
@section('css')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet">
@endsection
@section('contenido')
<div class="seccion-banner" style="background: url(/{!! $banner->imagen !!});">
    <div class="btexto" style="padding-top: 6%!important;">
        <div class="tbanner">
            <i>
                {!! $banner->texto1 !!}
            </i>
        </div>
    </div>
</div>
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 70%;">
    <div class="row">
        <div class="galeria col l12 m12 s12" style="width: 100%!important;margin-top: 85px;padding-left: 20px!important;padding-right: 0px!important;">
            @foreach($productos as $prod)
            @if($prod->visible!='privado')
            <a href="{{ route('zproductoinfo', $prod->id)}}">
                <div class="col l4 m12 s12 oyn">
                    @foreach($prod->imagenes as $img)
                    <div class="efecto" style="margin: 0">
                        @if($prod->oferta=='descuento')
                            <img class="responsive-img" src="{{ asset('img/descuento.png') }}"/> 
                        @else
                            <img class="responsive-img" src="{{ asset('img/promocion.png') }}"/> 
                        @endif
                    </div>
                    <div class="im">
                    <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                    </div>
                    <div class="div-nombrehome center" style="    position: relative;">
                    {!!$prod->nombre !!}
                </div>
                <div class="div-nombrecat center" style="color:#A3A3A3">
                    {!!$prod->categoria->nombre !!}
                </div>
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
