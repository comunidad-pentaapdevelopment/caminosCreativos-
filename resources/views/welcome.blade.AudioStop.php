<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CAMINOS CREATIVOS</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/miEstilo.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{asset('css/freelancer.min.css')}}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/home.css')}}" rel="stylesheet">
      <link href="{{asset('css/bxslider.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Caminos Creativos</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Ultimos Trabajos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">¿Quienes Somos?</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#trabajos">Trabajos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
        <header >
        <div class="container" id="maincontent" tabindex="-1">
            <!-- CAROUSEL PARA PUBLICIDADES -->
                <div class="row">
                    <ul class="slider"> 
                        @foreach($publicidades as $publicidad)
                        <li><img src="{{asset('img/portfolio/'.$publicidad->Imagen)}}" class="img-responsive img-centered"></li>
                        @endforeach
                    </ul>
                     
                </div>
<!-- CAROUSEL -->

            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                </div>
            </div>
        </div>

    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ultimos Trabajos</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                @foreach($ultimosTrabajos as $unTrabajo)
                <div class="col-sm-4 portfolio-item">
                    <a href="#{{$unTrabajo->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/portfolio/'.$unTrabajo->Imagen)}}" class="img-responsive" >
                    </a>
                </div>
                @endforeach
                </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Quienes Somos</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
                </div>
                <div class="col-lg-4">
                    <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
                </div>            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="trabajos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Trabajos</h2>
          
                    <hr class="star-primary">
            <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-condenser table-hover">
            <thead>
                <th>Tipo Trabajo</th>
                <th>Descripcion Corta</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Audio</th>
            </thead>
            @foreach($trabajos as $trab)
            <tr>
                <td>{{$trab->TipoTrabajo}}</td>
                <td>{{$trab->DescripcionCorta}}</td>
                <td>{{$trab->Cliente}}</td>
                <td>{{$trab->Fecha}}</td>
                <td>
                    <img src="{{asset('/img/portfolio/'.$trab->Imagen)}}" alt="{{$trab->DescripcionCorta}}" height="100px" width="100px" class="img-thumbnail">

                </td>
                <td>
                    <audio id="{{$trab->id}}" onplay="pararTodosLosAudios({{$trab->id}})" controls controlsList="nodownload"  preload="preload">
                         <source src="{{asset('/audios/'.$trab->Audio)}}" type="audio/mpeg">
                    </audio>
                </td>  
            </tr>
            @endforeach
            </table>
            </div>
            
        </div>

    </div>
                </div>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Direccion</h3>
                        <p>Mendoza 200
                            <br>San Miguel De Tucuman, Tucuman</p>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3>Encontranos en la Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/caminos.creativos.73" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/caminoscreativos283/" class="btn-social btn-outline"><span class="sr-only">Instagram</span><i class="fa fa-fw fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/caminos283" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCTi5rwR6BQKac6VZ7FFHa0A?view_as=subscriber" class="btn-social btn-outline"><span class="sr-only">Youtube</span><i class="fa fa-fw fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Pentapp-Development
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    @foreach($ultimosTrabajos as $unTrabajo)
    <div class="portfolio-modal modal fade" id="{{$unTrabajo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                        @foreach($tipoDeTrabajos as $tipotrabajo)
                            @if($tipotrabajo->id==$unTrabajo->tipotrabajoId)
                            <h2> {{$tipotrabajo->Descripcion}} - {{$unTrabajo->DescripcionCorta}}</h2>
                            @endif
                            @endforeach
                            <hr class="star-primary">
                            <img src="{{asset('img/portfolio/'.$unTrabajo->Imagen)}}" class="img-responsive img-centered" alt="">
                            <p>{{$unTrabajo->DescripcionLarga}}</p>
                            
                            <audio id="{{$unTrabajo->id}}" onplay="pararTodosLosAudios({{$unTrabajo->id}})" controls controlsList="nodownload"  preload="preload">
                                <source src="{{asset('/audios/'.$unTrabajo->Audio)}}" type="audio/mpeg">
                            </audio>
                            <ul class="list-inline item-details">
                                <li>Cliente:
                                    <strong><p>{{$unTrabajo->Cliente}}</p>
                                    </strong>
                                </li>
                                <li>Fecha:
                                    <strong><p>{{$unTrabajo->Fecha}}</p>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
    @endforeach
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    <script src="js/bxslider.js"></script>  
    <script>
        $(document).ready(function(){
            $('.slider').bxSlider({
                slideWidth:468,
                slideHeight:60,
                slideMargin:0,
                controls:false,
                auto:true,
                pause:1500,
                mode:'horizontal',
                speed:5000,
                randomStart:true,
                pager:false,
                infiniteLoop:true
            });
        });

        function pararTodosLosAudios(id){
            for (var j = elementosAudios.length - 1; j >= 0; j--) {
                if(id != elementosAudios[j].id){
                    elementosAudios[j].currentTime = 0;
                    elementosAudios[j].pause();
                }
            };
        }

        var elementosAudios = document.getElementsByTagName('audio');
    </script>

</body>

</html>
