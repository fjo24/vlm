@extends('privada.templates.body')
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
            <div class="categorias">
                <div style="">
                    <div class="row">
                        <div class="menuproductos col l3 s12 m3">
                            @include('pages.templates.menu')
                        </div>
                        <div class="col l9 s12 m9">
                            @foreach($productos as $producto)
                            <div class="col l4 s12 m4">
                                <div class="div-product">
                                    <a class="center" href="{{ route('zproductoinfo', $producto->id)}}">
                                        @foreach($producto->imagenes as $imagen)
                                        <div class="efecto">
                                            <span class="central">
                                                <i class="material-icons">
                                                    add
                                                </i>
                                            </span>
                                        </div>
                                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="width: 373px;height: 284px;">
                                            @if($ready == 0)	
	                             		@break;
	                             	@endif
	                             	@endforeach
                                                <div class="div-nombre">
                                                    {!!$producto->nombre !!}
                                                </div>
                                        </img>
                                    </a>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

@section('js')
        <script type="text/javascript">
            $(document).ready(function(){
    $('.collapsible').collapsible();
  });
        </script>
        @endsection
    </link>
</link>