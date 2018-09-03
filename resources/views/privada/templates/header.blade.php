<header>
    {{-- BARRA PRINCIPAL --}}
    <nav class="principal">
        <div class="container" style="width: 93%">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="redeshead col l4 m4 s4 center">
                            <ul class="center" style="margin-left: 38%;margin-top: 13%;">
                                <li class="redes_head">
                                    <a class="" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/layouts/facebook.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="redes_head">
                                    <a class="" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/layouts/youtube.png')}}">
                                        </img>
                                    </a>
                                </li>
                            </ul>
                    </div>
                    <div class="col l4 m4 s4">
                        <a class="brand-logo center" href="{{ url('/') }}">
                            <img alt="" src="{{asset('img/logo_head.jpg')}}">
                            </img>
                        </a>
                    </div>
                    <div class="privadohead col l4 m4 s4 center">
                            <ul class="center" style="margin-left: 22%;margin-top: 13%;">
                                <li class="privado_head">
                                    <a class="" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/layouts/privado.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="privado_head">
                                    <div class="dropdown-trigger" data-target="dropdown1">
                                        <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-transform: capitalize;line-height: 125%;margin-top: 8%;color: #F07D00">
                            Bienvenido, {{ Auth::User()->name }}<br>
                            (Cerrar Sesión)
                     
                                        </a>
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- BARRA SUPERIOR --}}
    <div class="top center">
        <div class="container hide-on-med-and-down">
            <ul class="item-left center hide-on-med-and-down">
                @if($activo=='pedidos')
                <li>
                    <a class="activo" href="{{ route('zproductos') }}">
                        PEDIDOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('zproductos') }}">
                        PEDIDOS
                    </a>
                </li>
                @endif
                @if($activo=='carrito')
                <li>
                    <a class="activo" href="">
                        CARRITO
                    </a>
                </li>
                @else
                <li>
                    <a href="">
                        CARRITO
                    </a>
                </li>
                @endif
                @if($activo=='ofertasynovedades')
                <li>
                    <a class="activo" href="">
                        OFERTAS O NOVEDADES
                    </a>
                </li>
                @else
                <li>
                    <a href="">
                        OFERTAS O NOVEDADES
                    </a>
                </li>
                @endif
                @if($activo=='historico')
                <li>
                    <a class="activo" href="">
                        HISTORICO
                    </a>
                </li>
                @else
                <li>
                    <a href="">
                        HISTORICO
                    </a>
                </li>
                @endif
                @if($activo=='listadeprecios')
                <li>
                    <a class="activo" href="">
                        LISTA DE PRECIOS
                    </a>
                </li>
                @else
                <li>
                    <a href="">
                        LISTA DE PRECIOS
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    </nav>
</header>