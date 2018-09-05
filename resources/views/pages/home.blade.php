@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="carousel carousel-slider center" data-indicators="true">
    @foreach($sliders as $slider)
    <div class="carousel-item" href="">
        <img alt="slider" src="{{ asset($slider->imagen) }}">
            @if(isset($slider->texto)||isset($slider->texto2))
            <div class="caption box-cap" style="">
                <div style="">
                    <span class="slidertext2">
                        {!! $slider->texto !!}
                    </span>
                    <span class="slidertext1">
                        {!! $slider->texto2 !!}
                    </span>
                </div>
            </div>
            @endif
        </img>
    </div>
    @endforeach
</div>
<div class="container" style="width: 84%;margin-top: 3%;">
    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l12 m12 s12 center" style="margin-bottom: 4%;">
                <span class="titulo_destacados">
                    <i>
                        Productos Destacados
                    </i>
                </span>
            </div>
            @foreach($productos as $producto)
            <div class="col l4 m4 s12">
                <div class="card" style="margin: 0% 7%;">
                    <div class="cuadradas card-image">
                        @foreach($producto->imagenes as $imagen)
                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="height: 294px;">
                            @if($ready == 0)	
	                             		@break;
	                        @endif
	                    @endforeach
                        </img>
                    </div>
                </div>
                <div class="div-nombre center">
                    {!!$producto->nombre !!}
                </div>
                <div class="div-nombrecat center">
                    {!!$producto->categoria->nombre !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container" style="width: 90%;margin-top: 5%;">
    <div class="row" style="margin-bottom: 7%;">
        <div class="col l12 m12 s12">
            @foreach($destacados as $destacado)
            <div class="col l6 m6 s12">
                <div class="card" style="margin: 0% 1%;">
                    <div class="cuadradas card-image">
                        <img alt="" class="responsive-img" src="{{asset($destacado->imagen)}}" style="height: 267px;">
                            <div class="caption box-cap-destacados center" style="">
                                <div class="div-nombredestacado center">
                                    <i>
                                        {!!$destacado->nombre !!}
                                    </i>
                                </div>
                            </div>
                        </img>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            height: 561,
            indicators: true
        });

        // move next carousel
        $('.moveNextCarousel').click(function(){
            $('.carousel').carousel('next');
        });

        // move prev carousel
        $('.movePrevCarousel').click(function(){
            $('.carousel').carousel('prev');
        });
    $('.slider').slider({
        indicators: true,
        height: 560,
    });


</script>
@endsection
