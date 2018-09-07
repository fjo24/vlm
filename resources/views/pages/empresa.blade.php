@extends('pages.templates.body')
@section('title', 'VLM - Empresa')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/empresa.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet">
@endsection
@section('contenido')
<div class="seccion-banner" style="background: url(/{!! $banner->imagen !!});">
    <div class="btexto">
    </div>
</div>
<div class="container" style="width: 90%">
    <div class="row toptab">
        <div class="col s12 m6">
            <span class="descripcion_empresa">
                {!! $empresa->descripcion !!}
            </span>
            <br>
                <span class="nombre_empresa">
                    {!! $empresa->nombre !!}
                </span>
                <br>
                    <span class="contenido_empresa">
                        {!! $empresa->contenido !!}
                    </span>
                </br>
            </br>
        </div>
        <div class="col s12 m6 l6">
            <div class="slider">
                <ul class="slides" style="height: 461px!important;width: 100%">
                    @foreach($imagenes as $imagen)
                    <li>
                        <img src="{{asset($imagen->imagen)}}">

                        </img>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 588,
    });
</script>
@endsection
