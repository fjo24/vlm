@extends('pages.templates.body')
@section('title', 'VLM - Productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/menuproductos.css') }}" rel="stylesheet">
        @endsection
@section('contenido')
        <div class="container" style="width: 90%;">
            <div class="categorias">
                <div style="">
                    <div class="row">
                        <div class="col l3 s12 m3">
                            @include('pages.templates.menu')
                        </div>
                        <div class="col l9 s12 m9">
                            @foreach($productos as $producto)
                            <div class="col l4 s12 m4">
                                <div class="div-product">
                                    <a href="{{ route('productoinfo', $producto->id)}}">
                                        @foreach($producto->imagenes as $imagen)
                                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="width: 373px;height: 284px;">
                                            @if($ready == 0)	
	                             		@break;
	                             	@endif
	                             	@endforeach
                                            <hr align="center">
                                                <div class="div-nombre">
                                                    {!!$producto->nombre !!}
                                                </div>
                                            </hr>
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