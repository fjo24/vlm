@extends('privada.templates.body')

@section('titulo', 'Línea VLM')
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
<div class="container" style="width: 89%; margin-bottom: 4%; margin-top: 4%;">
    <div class="row">
        <div class="left">
            <div class="imagen_catalogo">
                <a href="{{ route('file-pdf2', ['post' => $catalogo->id])}}">
                    <img alt="" src="{{asset('img/catalogo.png')}}">
                    </img>
                </a>
            </div>
<div class="center descargar_catalogo">
    <a href="{{ route('file-pdf2', ['post' => $catalogo->id])}}" style="color:#595959;">
        <img alt="" src="{{asset('img/descarga.png')}}">
        </img>
        Descargar Lista
    </a>
</div>
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
