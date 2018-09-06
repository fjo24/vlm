@extends('pages.templates.body')
@section('title', 'VLM - Productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pages/menuproductos.css') }}" rel="stylesheet">
            <link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet">
                @endsection
@section('contenido')
                <div class="seccion-banner" style="background: url(/{!! $categoria->banner !!});">
                    <div class="btexto">
                        <div class="tbanner">
                            <i>
                                {!! $categoria->nombre !!}
                            </i>
                        </div>
                        <div class="tbanner2">
                            <i>
                                {!! $categoria->descripcion !!}
                            </i>
                        </div>
                    </div>
                </div>
                <div class="container" style="width: 90%;">
                    <section class="productos">
                        <div class="categorias" style="height: 180%">
                            <div style="">
                                <div class="row">
                                    <div class="col l12 s12 m12" style="height: 240%;">
                                        <div class="col l3 s12 m3">
                                            <div class="menuproductos">    
                                                @include('pages.templates.menu')
                                            </div>
                                        </div>
                                        <div class="col l9 s12 m9" style="margin-top: 6%;">
                                            <div class="col l12 m12 s12" style="padding: 0;    height: auto;    padding-left: 2%!important;">
                                                <div class="col l6 m12 s12 galeriadeproducto">
                                                    <div class="cont-ser">
                                                        <div class="row imggrande">
                                                            <div class="col s12" style="padding-left: 0px;">
                                                                @foreach($p->imagenes as $imagen)
                                                                <div class="cont-img">
                                                                    <img alt="" class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                                                                    </img>
                                                                </div>
                                                                @if($ready == 0)    
                                        @break;
                                    @endif
                        @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12" style="padding-left: 0px;padding-right: 0px;">
                                                                @foreach($p->imagenes as $imagen)
                                                                <div class="col l4 s4 m2" style="padding-left: 0px;">
                                                                    <div class="cont-img">
                                                                        <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="border: 1px solid #AAAAAA;height: 110px; width: 110px;">
                                                                        </img>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l6 m12 s12 infoproducto" style="padding-left: 29px;">
                                                    <div class="nombreproductoinfo">
                                                        <i>
                                                            {!! $p->nombre !!}
                                                        </i>
                                                    </div>
                                                    <hr class="pro-line"/>
                                                    <div class="codigoproducto">
                                                        @foreach($p->modelos as $modelo)
        Código: {!! $modelo->codigo !!}
            @if($ready == 0)    
                @break;
            @endif
        @endforeach
                                                    </div>
                                                    <div class="descripcionproducto">
                                                        {!! $p->descripcion !!}
                                                    </div>
                                                    <div class="descripcionproducto" style="font-weight: 400;color: #595959;margin-bottom: -5%;">
                                                        {!! $p->nombre !!}
                                                    </div>
                                                    <div class="contenidoproducto">
                                                        {!! $p->contenido !!}
                                                    </div>
                                                    <a href="">
                                                        <button class="pedido btn btn-default left" href="" style="background-color: #89B8E6;">
                                                            <span class="rpedido">
                                                                CONSULTAR
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            @isset($p->video)
                                            <div class="masproducto col l12 m12 s12">
                                                <div class="col l6 m12 s12">
                                                    <div class="cont-ser">
                                                        <div class="col s12" style="padding-left: 0px;">
                                                            <div class="tituloproducto">
                                                                Más sobre este producto
                                                            </div>
                                                            <div class="descripcionvideo">
                                                                {!! $p->video_descripcion !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col hide-on-med-and-down l6 m12 s12" style="padding-left: 29px;">
                                                    <iframe allowfullscreen="" frameborder="0" height="216" src="{!! $p->video!!}" width="381">
                                                    </iframe>
                                                </div>
                                            </div>
                                            @endisset
                                            <div class="col l12 m12 s12 infoproducto" style="padding-left: 29px;">
                                                <div class="trelacionados">
                                                    Productos Relacionados
                                                </div>
                                                <hr class="rela-line"/>
                                            </div>
                                            <div class="col l12 m12 s12 relablock" style="margin-top: 2%;">
                                                @foreach($relacionados as $relacionado)
                                                <a href="{{ route('productoinfo', $relacionado->id)}}">
                                                    <div class="col l4 m6 s6 categoria-tarjeta">
                                                        @foreach($relacionado->imagenes as $img)
                                                        <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                                                        <h2 class="center" style="margin-left: 0px;margin-right: 0px;">
                                                            {{ $relacionado->nombre }}
                                                        </h2>
                                                        @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                                                    </div>
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </link>
        </link>
    </link>
</link>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });

    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
</script>
@endsection
