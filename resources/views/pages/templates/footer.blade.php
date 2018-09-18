<footer class="page-footer">
    <div class="container" style="width: 85%;">
        <div class="row">
            <div class="col l12 m12 s12">
                <div class="col l5 m5 s12" style="padding-top: 1.5%;">
                    <div class="col l12 m12 s12">
                        <div class="col l6 m6 s12">
                            <a class="" href="">
                                <img alt="" src="{{asset('img/layouts/deysefooter.png')}}">
                                </img>
                            </a>
                        </div>
                        <div class="col l6 m6 s12" style="padding-top: 2%;">
                            <a class="" href="">
                                <img alt="" src="{{asset('img/layouts/newdays.png')}}">
                                </img>
                            </a>
                        </div>
                    </div>
                    <div class="col l12 m12 s12" style="padding-top: 5%;">
                        {!!Form::open(['route'=>'newsletters.store', 'method'=>'POST', 'files' => true])!!}
                            <div class="form-group col l9 m9 s12 newsbox" style="padding-right: 0px; padding-left: 0px;padding-top: 1.5%;">
                                <label class="newsletter" for="news">
                                    NEWSLETTER
                                </label>
                                <input class="news form-control" name="email" placeholder="Ingrese su email" type="text">
                                </input>
                            </div>
                            <div class="col l3 m3 s12" style="width: 14%;">
                                <button class="btn btn-enviar" type="submit">
                                    Enviar
                                </button>
                            </div>
                        {!!Form::close()!!}
                    </div>
                </div>
                <div class="sitemap col l3 m6 s12">
                    <div class="footer-b" style="    padding-left: 2%;">
                        <h5 class="titulo-footer" style="    margin-top: 8%;">
                            SITEMAP
                        </h5>
                        <div class="linksb">
                            <ul>
                                <li>
                                    <a class="itemsb" href="{{ url('/') }}">
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Empresa
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Productos
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Quiero ser Distribuidor
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Zona privada
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="">
                                        Contacto
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s12" style="margin-top: 0.4%;">
                    <div class="col l1 m1 s1" style="">
                    </div>
                    <div class="col l2 m2 s3" style="padding-top: 4.5%;">
                        <img alt="" class="" src="{{asset('/../../../img/layouts/logofootervlm.png')}}">  
                        </img>
                    </div>
                    <div class="col l9 m9 s8" style="">
                        <h5 class="titulo-footer3" style="margin-top: 7%;">
                            VLM ARGENTINA
                        </h5>
                    </div>
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
