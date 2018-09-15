{{-- BARRA PRINCIPAL --}}
<nav class="principal">
    <div class="row superior">
        <div class="container" style="width: 90%;">
            <div class="col l12 m12 s12">
        <a href="#" data-target="slide-out" class="sidenav-trigger" style=" "><i class="material-icons" style="color: #806EA8;">menu</i></a>
                <div class="bloque1 col l6 m6 s6">
                    <div class="logodeyse col l6 m6 s12">
                        <a class="" href="{{ route('inicio') }}">
                            <img alt="" src="{{asset('img/layouts/logodeyse.png')}}">
                            </img>
                        </a>
                    </div>
                    <div class="logonewdays col l6 m6 s12">
                        <a class="" href="{{ route('inicio') }}">
                            <img alt="" src="{{asset('img/layouts/logonewdays.png')}}">
                            </img>
                        </a>
                    </div>
                </div>
                <div class="bloque2 right col l6 m6 s6">
                    <div class="col l6 m6 s12">
                    </div>
                    <div class="logovlm right col l6 m6 s12">
                        <a class="right" href="{{ route('inicio') }}">
                            <img alt="" src="{{asset('img/layouts/logovlm.png')}}">
                            </img>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row inferior hide-on-small-only">
        <div class="container" style="width: 90%;">
            <div class="row">
                <div class="col l12 m12 s12 center" style="height: 45px;">
                    <ul class="item-left center hide-on-med-and-down">
                        @if($activo=='empresa')
                        <li class="items_header">
                            <a class="activo" href="{{ url('/empresa') }}">
                                EMPRESA
                            </a>
                        </li>
                        @else
                        <li class="items_header">
                            <a href="{{ url('/empresa') }}">
                                EMPRESA
                            </a>
                        </li>
                        @endif
                        @if($activo=='producto')
                        <li class="items_header" id="menu_productos">
                            <a class="activo prod_menu" href="">
                                PRODUCTOS
                            </a>
                            <ul style="margin-top: -16%!important;">
                                    @foreach($categorias as $categoria)
                                <li class="menu_cate">
                                    <a href="{{ route('productos', $categoria->id)}}" style="padding-top: 5%;">
                                        {!! $categoria->nombre!!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li class="items_header" id="menu_productos">
                            <a class="prod_menu" href="">
                                PRODUCTOS
                            </a>
                                    <ul style="margin-top: -16%!important;">
                                    @foreach($categorias as $categoria)
                                <li class="menu_cate">
                                    <a href="{{ route('productos', $categoria->id)}}" style="padding-top: 5%;">
                                        {!! $categoria->nombre!!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @if($activo=='quiero')
                        <li class="items_header">
                        <a class="activo" href="{{ url('/quiero') }}" style="    width: 260px;">
                            QUIERO SER DISTRIBUIDOR
                        </a>
                        </li>
                        @else
                        <li class="items_header">
                            <a href="{{ url('/quiero') }}"  style="    width: 260px;">
                                QUIERO SER DISTRIBUIDOR
                            </a>
                        </li>
                        @endif
                        @if($activo=='contacto')
                        <li class="items_header">
                            <a class="activo" href="{{ url('/contacto') }}">
                                CONTACTO
                            </a>
                        </li>
                        @else
                        <li class="items_header">
                            <a href="{{ url('/contacto') }}">
                                CONTACTO
                            </a>
                        </li>
                        @endif
                        <li  class="items_header" style="    margin-right: 1%;padding-top: 1.3%;    border-right: 1px solid;
    height: 20px;margin-top: 1%;">
                        <a data-target="modalbuscador" class="lupa iconos-redes modal-trigger" style="margin-right: 0px;top: -17px;width: 90px;">
                            <img alt="" src="{{asset('img/layouts/lupa.png')}}">
                            </img>
                        </a>

                        <!-- Modal Structure -->
                  <div id="modalbuscador" class="modal">
                    <div class="modal-content">
                        <h4><a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #806EA8;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <h4 style="font-family: 'Source Sans Pro', sans-serif; color: #806EA8">Buscar por nombre de producto</h4>
                            <div class="center col l12 m12 s12" style="">   
                                {!!  Form::open(['route' => 'buscar', 'method' => 'POST','class' => 'center']) !!}
                                <div class="lupa">
                                    <input id="mobile_search" name="nombre" placeholder="" type="search">
                                    </input>
                                    <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: white!important;height: 39px;width: 153px;color: #806EA8;    border: 1px solid;font-family: 'Source Sans Pro', sans-serif;">Buscar
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                  </div>
                        </li>
                    @if(Auth::user())
                    <li class="items_header" style="    margin-left: 1%;padding-top: 1%;width: 4%;">
                        <a class="" href="{{ route('listadeprecios') }}" style="margin-right: 0px;bottom: 3px;">
                            <img alt="" src="{{asset('img/layouts/zonaprivada.png')}}">
                            </img>
                        </a>
                    </li>
                    @else
                    <li class="dropdown-trigger hide-on-med-and-down" data-target="dropdown1">
                        <a href="" style="color: #F07D00;margin-top: 11%;">
                            <img alt="" src="{{asset('img/layouts/zonaprivada.png')}}">
                            </img>
                        </a>
                    </li>
                    @endif
                    <!-- Dropdown LOGIN -->
                <div class="areaprivada">
                    <ul class="dropdown-content" id="dropdown1" style="background: none, width:400px!important; height: 282px!important;">
                        <div class="container" style="background: #FAFAFA; margin-top: 19px !important; outline: none; width: 282px;height: 62px;">
                            {!!Form::open(['route'=>'logindistribuidor', 'method'=>'POST'])!!}
                            <div class="row">
                        <div class="input-field col s12">
                            <label for="Usuario" style="height: 65%;">Usuario</label>
                            <input class="" name="username" type="text" style="border-bottom: 1px solid black;margin-top: 11%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password" style="height: 65%;">Contraseña</label>
                            <input class="" name="password" type="password" style="border-bottom: 1px solid black;margin-top: 11%;">
                        </div>
                    </div>
                            <style type="text/css">
                                .color-del-boton{
                 background-color: #01A0E2;
            }
            .color-del-boton:hover{
                 background-color: #01A0E2;
            }
                            </style>
                            <div class="col s12" style="position: relative;right: 24%;margin-top: 9%;
    margin-bottom: 2%;">
                                <input class="waves-effect waves-light btn right colorboton" style="color: white;font-family: 'Lato';font-weight: bold;padding-top: 4%;background-color: #89B8E6" type="submit" value="INGRESAR">
                                </input>
                            </div>
                            <li class="center" style="font-size: 12px;color: pink; text-decoration: none;">
                                <a href="{{ url('registro') }}" style="color: #9976D2!important; text-align: center;">
                                    CREAR UNA CUENTA NUEVA
                                </a>
                            </li>
                            {!!Form::close()!!}
                        </div>
                    </ul>
                </div>
                <!-- Dropdown LOGIN FIN -->
                </ul>

                </div>
            </div>
        </div>
    </div>
</nav>

{{-- Para moviles --}}
<ul class="sidenav" id="slide-out" style="position: absolute;color: #7D0045;">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/') }}">
                    <span class="side">
                        INICIO
                    </span>
                    <i class="material-icons">
                        home
                    </i>
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/empresa') }}">
                    <i class="material-icons">
                        group
                    </i>
                    EMPRESA
                </a>
            </li>
            <li class="bold">
                <a href="{{ route('productos', 1)}}" class="collapsible-header waves-effect waves-admin">
                    <i class="material-icons">
                        map
                    </i>
                    PRODUCTOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/quiero') }}">
                    <i class="material-icons">
                        new_releases
                    </i>
                    QUIERO SER DISTRIBUIDOR
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/contacto') }}">
                    <i class="material-icons">
                        build
                    </i>
                    CONTACTO
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/contacto') }}">
                    <i class="material-icons">
                        build
                    </i>
                    ZONA PRIVADA
                </a>
            </li>
        </ul>
    </ul>
 {{-- Para moviles fin--}} 