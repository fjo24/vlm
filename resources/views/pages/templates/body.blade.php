<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <title>
                                :: VLM :: - @yield('titulo')
                            </title>

                            <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png"/>
                            
                            <link href="{{ asset('css/pages/layouts/header.css') }}" rel="stylesheet">
                            <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/menuproductos.css') }}" rel="stylesheet">
                            <link href="{{ asset('css/pages/desplegable.css') }}" rel="stylesheet">
                                <link href="{{ asset('css/pages/layouts/footer.css') }}" rel="stylesheet">
                                    @yield('css')
                              <!--     
                               <?php 
header('Access-Control-Allow-Origin: *'); 
?>
                                    <link href="http://allfont.es/allfont.css?fonts=raleway-extrabold" rel="stylesheet" type="text/css" />-->
                                    <link href="https://fonts.googleapis.com/css?family=Asap:400,400i,500i,600,700" rel="stylesheet">
                                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                        <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">

                                            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

       <!--    <script type="text/javascript" src="http://osolelaravel.com/drimer/js/materialize.min.js"></script>-->
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>

    </head>
    <body>
        <!-- CABECERA -->
        <header>
            @include('pages.templates.header')
        </header>
        <main style="">
            @yield('contenido')
        </main>
            @include('pages.templates.footer')
        <!--Import jQuery before materialize.js-->
        <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
        <!-- Materialize Core JavaScript -->
        <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
        </script>
        @yield('js')
        <script type="text/javascript">
         $(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({
        closeOnClick:false,
    });
    $(".dropdown-trigger2").dropdown({
        closeOnClick:false,
    });
    $(".dropdown-trigger3").dropdown({
        closeOnClick:false,
    });

  });


        $(".collapsible").collapsible()({
          
          });



        $('.dropdown-button').dropdown({
          hover: true
        });
    </script>
    </body>
</html>