@extends('pages.templates.body')

@section('titulo', 'Línea VLM')
@section('css')
    <link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productoinfo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
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
<div class="container" style="width: 89%">
    <section class="productos">
        <div class="row">
            <div class="col l12 m12 s12" style="padding-right: 0px;padding-left: 22px;">
                <div class="col l3 s12 m12">
                                            <div class="menuproductos">    
                                                @include('pages.templates.menu')
                                            </div>
                                        </div>
                <div class="galeria2 col l9 m9 s12">
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
                                                            <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="border: 1px solid #AAAAAA; width: 110px;">
                                                            </img>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </br>
                                </div>




                        </div>
                        <div class="col l6 m12 s12 infoproducto" style="padding-left: 29px;">
                            <div class="nombreproducto">    
                                {!! $p->nombre !!}
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
                            <div class="contenidoproducto">    
                                {!! $p->contenido !!}
                            </div>
                            <div class="row">
                                <div class="col l5 m5 s5" style="font-family: 'Lato';    font-size: 18px;color: #9972d2;">    
                                    PRESENTACIÓN
                                </div>
                                <div class="col l7 m7 s7" style="font-family: 'Lato';    font-size: 18px;color: #595959;">    
                                    @foreach($p->modelos as $modelo)
                                    {!! $modelo->nombre !!} / <i>Cod:</i> {!! $modelo->pivot->codigo !!}<br>
                                    @endforeach
                                </div>
                            </div>
                               <a href="{{ route('contacto') }}">
        <button class="pedido btn btn-default left" href="" style="background-color: #85b7e6;">
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
                            <div class="titulo_video">    
                                Más sobre este producto
                            </div>
                            <div class="descripcionvideo">    
                                {!! $p->video_descripcion !!}
                            </div>

                                                </div>
                                </div>
                           </div>
                        <div class="col hide-on-med-and-down l6 m12 s12" style="padding-left: 29px;">
                            <iframe width="381" height="216" src="{!! $p->video!!}" frameborder="0" allowfullscreen></iframe>
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
                    @foreach($p->productos as $relacionado)
                    <a href="{{ route('productoinfo', $relacionado->id)}}">
                        <div class="col l4 m6 s6">
                            <div class="card" style="margin: 0% 7%;">
                                <div class="cuadradas card-image">
                                    @foreach($relacionado->imagenes as $imagen)
                                    <a href="{{ route('productoinfo', $p->id)}}">
                                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="">
                                            @if($ready == 0)    
                                                        @break;
                                            @endif
                                        </img>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="div-nombrehome center" style="    position: relative;">
                                {!!$relacionado->nombre !!}
                            </div>
                        </div>
                    </a>
                    @endforeach 

                    </div>


            
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('js/jquery.tinycarousel.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
    $(document).ready(function()
        {
            $('.slider-for').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
              slidesToShow: 3,
              slidesToScroll: 1,
              asNavFor: '.slider-for',
              focusOnSelect: true,
              dots: false
            });

            $( "#cantidad" ).change(function() {
                let cantidad = $(this).val();
                let precio = $("#input_precio").val();

                $('#precio').html("$"+(cantidad*precio).toFixed(2));
            });

            
            $('.modal').modal({
                dismissible: false,
            });

            $('#modal1').modal('open');

        });

    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
</script>
@endsection

