{{-- BARRA PRINCIPAL --}}
<nav class="principal">
    <div class="row superior">
        <div class="container" style="width: 90%;">
            <div class="col l12 m12 s12">
        <a href="#" data-target="slide-out" class="sidenav-trigger" style=" "><i class="material-icons" style="color: #806EA8;">menu</i></a>
                <div class="bloque1 col l6 m6 s6">
                    <div class="logodeyse col l6 m6 s12">
                        <a class="" href="">
                            <img alt="" src="{{asset('img/layouts/logodeyse.png')}}">
                            </img>
                        </a>
                    </div>
                    <div class="logonewdays col l6 m6 s12">
                        <a class="" href="">
                            <img alt="" src="{{asset('img/layouts/logonewdays.png')}}">
                            </img>
                        </a>
                    </div>
                </div>
                <div class="bloque2 right col l6 m6 s6">
                    <div class="col l6 m6 s12">
                    </div>
                    <div class="logovlm right col l6 m6 s12">
                        <a class="right" href="">
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
                    @if($activo=='videos')
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

                <li class="items_header" id="menu_productos">
                    <a class="activo prod_menu" href="">
                        PRODUCTOS
                    </a>

                            <ul style="margin-top: -16%!important;">
                            @foreach($categorias as $categoria)
                        <li class="menu_cate">
                            <a href="{{ route('productos', $categoria->id)}}" style="text-transform: lowercase;padding-top: 5%;">
                                {!! $categoria->nombre!!}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                        </li>
                    <li class="items_header">
                    <a href="" style="    width: 260px;">
                        QUIERO SER DISTRIBUIDOR
                    </a>
                    </li>
                    <li class="items_header">
                    <a href="">
                        CONTACTO
                    </a>
                    </li>
                    <li  class="items_header" style="    margin-right: 1%;padding-top: 1.3%;    border-right: 1px solid;
height: 20px;margin-top: 1%;">
                    <a class="lupa" href="" style="margin-right: 0px;top: -13px;width: 90px;">
                        <img alt="" src="{{asset('img/layouts/lupa.png')}}">
                        </img>
                    </a>
                    </li>
                    <li  class="items_header" style="    margin-left: 1%;padding-top: 1%;width: 4%;">
                    <a class="" href="" style="margin-right: 0px;bottom: 3px;">
                        <img alt="" src="{{asset('img/layouts/zonaprivada.png')}}">
                        </img>
                    </a>
                    </li>
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
                <a href="" class="collapsible-header waves-effect waves-admin">
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