<footer class="page-footer">
    <div class="container" style="width: 100%">
        <div class="row" style="display:  flex; align-items:  center;">
            <div class="col l12 s12 m12">
                <div class="footer-a col l4 s12 m6">
                    <div class="col l12 s12 m12">
                        <div class="row">
                            <div class="logfooter center">
                                <img alt="" src="{{asset('img/layouts/logo_footer.jpg')}}">
                                </img>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 s12 m12">
                        <div class="li-redes-footer">
                            <div class="item-redesf">
                                <a href="">
                                    <img alt="" class="" src="{{asset('img/layouts/facebook_footer.png')}}">
                                    </img>
                                </a>
                            </div>
                            <div class="item-redesf">
                                <a href="">
                                    <img alt="" class="" src="{{asset('img/layouts/youtube_footer.png')}}">
                                    </img>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-b col l4 s12 m6 hide-on-med-and-down" style="    padding-left: 2%;">
                    <h5 class="titulo-footer" style="    margin-top: 13%;">
                        MAER
                    </h5>
                    <div class="linksb">
                        <div class="col l6 s6 m6">
                            <ul>
                                <li>
                                    <a class="itemsb" href="{{ url('/') }}">
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{ url('/empresa') }}">
                                        Quiénes Somos
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Productos
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col l6 s6 m6">
                            <ul>
                                <li>
                                    <a class="itemsb" href="{{ url('/videos') }}">
                                        Videos
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{ url('/calidad') }}">
                                        Calidad
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Novedades
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{ url('/contacto') }}">
                                        Contacto
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer_c col l4 s12 m6 left hide-on-med-and-down">
                    <h5 class="titulo-footer3" style="margin-top: 13%;">
                        Maer Sistemas de Pintar
                    </h5>
              
                        <div class="listlinks2 col l12 m12 s12">
                            <ul>
                                <li>
                                    <div class="rightlist">
                                        <div class="col s1" style="">
                                            <img alt="" class="" src="{{asset('img/layouts/ubicacion.png')}}">
                                            </img>
                                        </div>
                                    </div>
                                    <div class="rightlist">
                                        <div class="col s11" style="line-height: 18px!important;">
                                            {{$direccion->descripcion}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rightlist">
                                        <div class="col s1" style="">
                                            <img alt="" class="" src="{{asset('img/layouts/telefono.png')}}">
                                            </img>
                                        </div>
                                    </div>
                                    <div class="rightlist col s11" style="line-height: 29px!important">
                                            {{$telefono->descripcion}}
                                            <br>
                                    </div>
                                </li>
                                <li>
                                    <div class="rightlist">
                                        <div class="col s1" style="">
                                            <img alt="" class="" src="{{asset('img/layouts/email.png')}}">
                                            </img>
                                        </div>
                                    </div>
                                    <div class="rightlist">
                                        <div class="col s11" style="line-height: 29px!important;">
                                            {{$email->descripcion}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                 
                </div>
            </div>
        </div>
    </div>
</footer>
