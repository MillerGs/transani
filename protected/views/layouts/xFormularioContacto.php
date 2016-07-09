<!DOCTYPE html>

<html lang="en" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
    <head>
        <title>Transani</title>
        <meta charset="utf-8">
        <meta name="description" content="Servicio de Transpote, Giros y Encomiendas">
        <meta name="keywords" content="Transporte, Viajes, Tours">
        <meta name="author" content="TRANSANI INVERSIONES Y TRANSPORTES">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/images/faviconT.ico">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
          <!--[if lt IE 9]><script src="js/modernizr.custom.js"></script><![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/45f3164a/bootstrap/css/bootstrap.min.css" />
        
        <script src="http://www.transani.esy.es/<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
        <script src="http://www.transani.esy.es/<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
        
        <?php
        $var1 = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
        Yii::app()->clientScript->registerScriptFile($var1 . '/scripts/jquery-1.11.1.min.js');
        Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxcore.js');
        Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxbuttons.js');
        Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxwindow.js');
        Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxinput.js');
        Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.ui-smoothness.css');
        Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.base.css');
        Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.metrodark.css');
        Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.ui-start.css');
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                fn_fechaTitulo();
<?php
if (!Yii::app()->user->isGuest) {
    ?>
                    $("#jqxBtnIniciarSesion").css("visibility", "hidden");
                    $("#jqxBtnIniciarSesion2").css("visibility", "hidden");

                    $("#jqxBtnSalirSesion").jqxButton({width: '50', theme: 'metrodark'});
                    $("#jqxBtnSalirSesion").on('click', function () {
                        window.location = "<?php echo Yii::app()->createUrl('site/logout'); ?>";
                    });

                    $("#jqxBtnVerPerfil").jqxButton({width: '80', theme: 'metrodark'});
                    $("#jqxBtnVerPerfil").on('click', function () {

                    });

    <?php
} else {
    ?>
                    $("#jqxBtnSalirSesion").css("visibility", "hidden");
                    $("#jqxBtnVerPerfil").css("visibility", "hidden");

                    $("#jqxBtnIniciarSesion").jqxButton({width: '120', theme: 'metrodark'});
                    $("#jqxBtnIniciarSesion2").jqxButton({width: '120'});
                    $("#jqxBtnIniciarSesion").on('click', function () {
                        fn_IniciarSesion();
                    });
                    $("#jqxBtnIniciarSesion2").on('click', function () {
                        fn_IniciarSesion();
                    });
    <?php
}
?>
                var offset = $("#jqxBtnIniciarSesion").offset();
                var offset = $("#jqxBtnIniciarSesion2").offset();
                $("#popupIniciarSesion").jqxWindow({theme: "ui-smoothness",
                    position: {x: parseInt(offset.left) - 155, y: parseInt(offset.top) + 30},
                    animationType: 'slide',
                    width: 280, height: 200, resizable: false, isModal: true, autoOpen: false, cancelButton: $("#CancelN"), modalOpacity: 0.5
                });

                // Create jqxButton widgets.




            });
            function fn_IniciarSesion() {

                $.ajax({
                    type: "POST",
                    url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/iniciarSesion",
                    //data:  {val1:1,val2:2},
                    beforeSend: function () {

                    },
                    success: function (msg) {
                        //$("#popupCargando").jqxWindow('close');
                        $("#contenIniciarSesion").html(msg);


                        $("#popupIniciarSesion").on('open', function () {
                            fn_limpiarFormSesion();
                        });
                        $("#popupIniciarSesion").jqxWindow({height: 170, width:280});
                        $("#popupIniciarSesion").jqxWindow('open');
                    },
                    error: function (xhr) {
                        alert("failure" + xhr.readyState + this.url)

                    }
                });
            }
            function fn_fechaTitulo() {
                mydate = new Date();
                myday = mydate.getDay();
                mymonth = mydate.getMonth();
                myweekday = mydate.getDate();
                weekday = myweekday;

                if (myday == 0)
                    day = " Domingo ";

                else if (myday == 1)
                    day = " Lunes ";

                else if (myday == 2)
                    day = " Martes ";

                else if (myday == 3)
                    day = " Miércoles ";

                else if (myday == 4)
                    day = " Jueves ";

                else if (myday == 5)
                    day = " Viernes ";

                else if (myday == 6)
                    day = " Sábado ";

                if (mymonth == 0)
                    month = "Enero ";

                else if (mymonth == 1)
                    month = "Febrero ";

                else if (mymonth == 2)
                    month = "Marzo ";

                else if (mymonth == 3)
                    month = "Abril ";

                else if (mymonth == 4)
                    month = "Mayo ";

                else if (mymonth == 5)
                    month = "Junio ";

                else if (mymonth == 6)
                    month = "Julio ";

                else if (mymonth == 7)
                    month = "Agosto ";

                else if (mymonth == 8)
                    month = "Setiembre ";

                else if (mymonth == 9)
                    month = "Octubre ";

                else if (mymonth == 10)
                    month = "Noviembre ";

                else if (mymonth == 11)
                    month = "Diciembre ";

                $("#idFechaTitulo").html("Hoy es" + day + " de " + month);
            }
        </script>

    </head>
    <body>
        <!-- wraper -->
        <div id="wrapper">
            <!-- shell -->
            <div class="shell">
                <!-- container -->
                <div class="container">
                    <!-- header -->
                    <header id="header">
                        <!--<h1 id="logo"><a href="#">Curve</a></h1>-->
                        <img class="img-responsive" style="width: 330px" src="<?php  echo Yii::app()->request->baseUrl ?>/images/banner.png">; 
                            
                        <!-- search -->
                        <div class="search">
                            <form method="post" action="#">
                                <span class="field">
                                <!--<input type="text" class="field" value="keywords here ..." title="keywords here ...">-->

                                    <?php
                                    if (!Yii::app()->user->isGuest) {
                                        $usuar = Usuario::model()->findByAttributes(array('idusuario' => Yii::app()->user->getId()));
                                        ?>
                                        <div style="background-color: #EFFDFF;border: 1px solid #79B4DC;">
                                            <table>

                                                <tr>
                                                    <td>
                                                        <?php
                                                        $avatar = Persona::model()->findByAttributes(array('idpersona' => $usuar->idpersona))->foto;
                                                        if ($avatar)
                                                            echo '<img alt="image" height="60px"  class="img-responsive" src="' . Yii::app()->request->baseUrl . '/index.php/Persona/Verfoto/' . $usuar->idpersona . '">';
                                                        else {

                                                            echo '<img height="110px" src="' . Yii::app()->request->baseUrl . '/images/perfilfem.jpg">';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td><h2><?php echo $usuar->idpersona0->nombres . ' ' . $usuar->idpersona0->apellidos; ?></h2>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="button" value="Ver Perfil" id="jqxBtnVerPerfil" />   
                                                                            </td>
                                                                            <td>
                                                                                <input type="button" value="Salir" id="jqxBtnSalirSesion" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td>
                                                        <div id ="idFechaTitulo"></div>
                                                    </td>
                                                </tr>               





                                            </table>  
                                        </div>               
                                    <?php }
                                    ?>
                                    <input type="button" value="Iniciar Sesión" id="jqxBtnIniciarSesion" />;
                                </span>

                            </form>
                        </div>
                        <!-- end of search -->
                    </header>
                    <!-- end of header -->
                    <!-- navigation -->
                    <nav id="navigation"> <a href="#" class="nav-btn">INICIO<span class="arr"></span></a>
                        <ul>
                            <li class="active"><a href="/systransporte/index.php/site/index/">INICIO</a></li>
                            <li><a href="#">NUESTRO SERVICIOS</a></li>
                            <li><a href="#">¿QUIÉNES SOMOS?</a></li>
                            <li><a href="/systransporte/index.php/Site/registro">REGISTRO</a></li>
                        </ul>
                    </nav>
                    <!-- end of navigation -->
                    <!-- Formulario -->
                    <div class="row">
                        <table style="width: 90%; margin: 10px 30px;">
                            <tr>
                                <td>
                                    <form action="#" method="post">
                                    <table>
                                        <tr>
                                            <td colspan="2"><h3>Formulario de contacto</h3></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre <span style="color:red">*</span></td>
                                            <td><input type="text" name="nombre" id="nombre" size="25" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Correo <span style="color:red">*</span></td>
                                            <td><input type="email" name="correo" id="correo" size="25" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Contrase&ntilde;a <span style="color:red">*</span></td>
                                            <td><input type="password" name="asunto" id="asunto" size="25" required/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td><button class="btn btn-info" type="reset">Cancelar</button></td>
                                                        <td><button class="btn btn-success" type="submit">Enviar</button></td>
                                                    </tr>
                                                    <tr><td colspan="2">&nbsp;</td></tr>
                                                    <tr>
                                                        <td colspan="2"><a id="jqxBtnIniciarSesion2">¿Ya estas registrado?</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    </form>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>
                                    <iframe width="560" height="315" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?layer=c&panoid=uMuwKYL9b-D7d43sSspf2A&ie=UTF8&source=embed&output=svembed&cbp=13%2C312.67%2C%2C0%2C6.760000000000005"></iframe><br /><small><a href="https://www.google.com.pe/maps/@-8.1295397,-79.0431137,3a,75y,312.67h,83.24t/data=!3m6!1e1!3m4!1suMuwKYL9b-D7d43sSspf2A!2e0!7i13312!8i6656!6m1!1e1?hl=es">View Larger Map</a></small>
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <!--end fo Formulario -->
                    <div class="socials">
                        <div class="socials-inner">
                            <h3>Síguenos en</h3>
                            <ul>
                                <li><a href="#" class="facebook-ico"><span></span>Facebook</a></li>
                                <li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>
                                <li><a href="#" class="rss-feed-ico"><span></span>Rss-feed</a></li>
                                <li><a href="#" class="myspace-ico"><span></span>myspace</a></li>
                                <li><a href="#" class="john-doe-123-ico"><span></span>john.doe.123</a></li>
                            </ul>
                            <div class="cl">&nbsp;</div>
                        </div>
                    </div>
                    <div id="footer">
                        <div class="footer-cols">
                            <div class="col">
                                <h2>Servicio de Transporte</h2>
                                <ul>
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Branding</a></li>
                                    <li><a href="#">Seo Optimization</a></li>
                                    <li><a href="#">Mobile App Development</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h2>Giros</h2>
                                <ul>
                                    <li><a href="#">Lorem ipsum dolor </a></li>
                                    <li><a href="#">Consectetuer adipiscing</a></li>
                                    <li><a href="#">Proin sed odio et ante </a></li>
                                    <li><a href="#">Mazim sensibus et usu</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h2>Encomiendas</h2>
                                <ul>
                                    <li><a href="#">Lorem ipsum dolor</a></li>
                                    <li><a href="#">Consectetuer adipiscing</a></li>
                                    <li><a href="#">Proin sed odio et ante </a></li>
                                    <li><a href="#">Mazim sensibus et usu</a></li>
                                </ul>
                            </div>

                            <div class="cl">&nbsp;</div>
                        </div>
                        <!-- end of footer-cols -->
                        <div class="footer-bottom">
                            <nav class="footer-nav">
                                <ul>
                                    <li><a href="/systransporte/index.php/site/index/">Inicio</a></li>
                                    <li><a href="#">Servicio de Transporte</a></li>
                                    <li><a href="#">Giros</a></li>
                                    <li><a href="#">Encomiendas</a></li>
                                    <li><a href="#">Nosotros</a></li>
                                    <li class="active"><a href="#">Contáctanos</a></li>
                                </ul>
                            </nav>
                            <p class="copy">&copy; Copyright 2014 inversiones y transportes E.I.R.L. YSRAEL <span>|</span> <strong>Diseñado por <a target="_blank" href="http://mycloudtec.com">www.mycloudtec.com</a></strong></p>
                            <div class="cl">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <!-- end of container -->
            </div>
            <!-- end of shell -->
        </div>
        <!-- end of wrapper -->


        <!--POPUT OCULTO PARA INICIAR SESION-->
        <div id="popupIniciarSesion">
            <div>Iniciar Sesión</div>
            <div style="overflow: hidden;">
                <div class="row">
                    <div class="col-md-12 " id="contenIniciarSesion">

                    </div>
                </div>
            </div>              

        </div>
    </body>
</html>


<style>
    /* ESTILO PARA LOS BOTONES*/


    * { margin: 0; padding: 0; outline: 0; }

    body, html { height: 100%; }

    body {
        font-size: 12px;
        line-height: 22px;
        font-family: arial, sans-serif;
        color: #828282;
        background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/body.png) repeat 0 0;
        min-width: 100%;
    }

    /*font-family: 'Ubuntu', sans-serif;*/

    a { color: #0252aa; text-decoration: none; cursor: pointer; }
    a:hover { text-decoration: underline; }
    a img { border: 0; }
    a.more { color: #2b9208; text-decoration: underline; padding-left: 11px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/arr-ico.png) no-repeat 0 5px; }
    a.more:hover { text-decoration: none;  }
    input, textarea, select { font-size: 12px; font-family: arial, sans-serif; }
    textarea { overflow: auto; }

    .cl { display: block; height: 0; font-size: 0; line-height: 0; text-indent: -4000px; clear: both; }
    .notext { font-size: 0; line-height: 0; text-indent: -4000px; }
    .left, .alignleft { float: left; display: inline; }
    .right, .alignright { float: right; display: inline; }

    article, aside, details, footer, header, menu, nav, section { display: block; }

    .shell { width: 990px; margin: 0 auto; }
    .container { background: #fff; box-shadow: 0px 0px 13px rgba(0,0,0,0.3) ; -moz-box-shadow: 0px 0px 13px rgba(0,0,0,0.3) ; -webkit-box-shadow: 0px 0px 13px rgba(0,0,0,0.3) ; -o-box-shadow: 0px 0px 13px rgba(0,0,0,0.3) ;  }
    #header { height: 80px; padding-top: 21px; padding-left: 33px; padding-right: 17px;  }
    #logo { width: 81px; float: left; font-size: 0; line-height: 0;}
    #logo a { height: 33px; display: block; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/logo.png) no-repeat 0 0;  text-indent: -4000px; }

    .search { float: right; }
    .search input.field { border: 1px solid #d6d6d6; background: #ededed; width: 166px; height: 24px; line-height: 22px;  padding: 0px 10px; float: left; font-size: 11px; font-family: verdana, arial, helvetica, serif;  color: #bebebe;  border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; -o-border-radius: 5px;}
    .search input.search-btn { width: 22px; height: 26px; margin-left: 3px;  border: 0; cursor: pointer; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/search-btn.png) no-repeat 0 0; float: left; font-size: 0; line-height: 0; text-indent: -4000px;  }

    #navigation { height: 52px; padding-top: 4px; font-family: 'Ubuntu', sans-serif; font-weight: 700; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/navigation.png) repeat-x 0 0; box-shadow: 0px -1px 2px rgba(0,0,0,0.1); -moz-box-shadow: 0px -1px 2px rgba(0,0,0,0.1); -webkit-box-shadow: 0px -1px 2px rgba(0,0,0,0.1); -o-box-shadow: 0px -1px 2px rgba(0,0,0,0.1);  }
    #navigation ul { list-style: none; list-style-position: outside; }
    #navigation ul li { float: left; padding-right: 2px; line-height: 52px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/nav-border.png) no-repeat right 0;  font-size: 13px; text-transform: uppercase; }
    #navigation ul li a { display: block; padding: 0 32px 0 28px; color: #878787;  }
    #navigation ul li a:hover,
    #navigation ul li.active a  { text-decoration: none; color: #2b9208; }
    #navigation ul li.first a { padding-left: 38px; }
    #navigation a.nav-btn { display: none; }

    .slider-holder { position: relative; z-index: 5; }
    .slider-holder span.slider-b { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/slider-bottom.png) no-repeat 0 0;  width: 990px; height: 30px; position: absolute; bottom: 0px; left: 0px; z-index: 100;}
    .slider-holder span.slider-shadow { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/slider-shadow.png) no-repeat 0 0;  width: 990px; height: 13px; position: absolute; top: 0px; left: 0px; z-index: 100; display: block; }
    .slider { width: 990px;  height: 378px; position: relative;  background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/slide-img.png) no-repeat 0 0;}
    .slider ul.slides { list-style: none; list-style-position: outside; }
    .slider ul.slides li { width: 990px; height: 378px; float: left; position: relative; overflow: hidden; }

    .slider ul.slides li .img-holder { width: 741px; height: 347px; position: absolute; bottom: 0px; right: 0px; }
    .slider ul.slides li .img-holder img { width: 741px; height: 347px; }

    .slider ul.slides li .slide-cnt { width: 320px; padding: 33px 0 0 34px; position: absolute; left: 0; top: 20px; }
    .slider ul.slides li .slide-cnt h2 { font-size: 44px; line-height: 44px; padding-bottom: 16px; color: #fff; text-shadow: rgba(0,0,0,0.4) 0px 1px 2px; font-family: 'Ubuntu', sans-serif; font-weight: 700; }
    .slider ul.slides li .slide-cnt p { color: #fff; font-size: 14px; padding-bottom: 22px; }
    .slider ul.slides li .slide-cnt a.grey-btn { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/grey-btn.png) no-repeat 0 0; width: 186px; height: 45px; text-align: center; line-height: 40px; display: block; font-weight: bold; font-size: 18px;  color: #636363; text-shadow: rgba(255,255,255,0.4) 0px 1px 0px; }
    .slider ul.slides li .slide-cnt a.grey-btn:hover { background-position: 0 -47px; text-decoration: none; }
    .flex-control-nav { left: 480px; }
    .main a.m-btn-grey { display: none; }

    .main { padding: 47px 0px 0px;  background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/main.png) repeat-x 0 0; }
    .main h2 { font-size: 22px; color: #2d5900; line-height: 22px; padding-bottom: 8px; font-family: 'Ubuntu', sans-serif; font-weight: 500; }
    .main h3 { font-size: 18px; color: #5e5e5e; line-height: 22px; padding-bottom: 8px; font-family: 'Ubuntu', sans-serif; font-weight: 500;  }
    .main section { clear: both; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/section-shadow.png) no-repeat center bottom; padding: 0 20px 60px; }
    .main ul { list-style: none; list-style-position: outside; }
    .main ul li { padding-bottom: 6px; padding-left: 10px; background: url(images/arr-ico.png) no-repeat 0 8px; }
    .main ul li a { color: #2b9208; text-decoration: underline; } 
    .main ul li a:hover { text-decoration: none; } 

    .main .cols { padding-left: 0; padding-right: 0; }
    .main .cols .col { width: 314px; float: left; }
    .main .cols .col:after { content:''; width: 100%; clear: both; }
    .main .cols .col + .col { padding-left: 20px; }
    .main .cols .col img { float: left; width: 129px; height: 108px;  }
    .main .cols .col-cnt { width: 183px; float: right; }

    .main .post  { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/cols-shadow.png) no-repeat 0 bottom; padding-top: 28px; padding-left: 40px;  }
    .main .post .video-holder { width: 435px; height: 245px; float: left; margin-right: 20px; }
    .main .post h2 { padding-bottom: 15px; }
    .main .post p { padding-bottom: 8px; }
    .main .post p strong { display: block; }
    .main .post-cnt { float: right; width: 475px; }

    .main .testimonial { padding-top: 20px; padding-bottom: 20px;  text-align: center; background: transparent; }
    .main .testimonial strong.quote { font-size: 28px; font-family: georgia ,arial, helvetica, serif; position: relative; top: 10px; left: -6px; }
    .testimonial h2 { padding-bottom: 12px; }
    .testimonial p { padding-bottom: 6px; }
    .testimonial p.author { text-align: right; }

    .socials { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/socials-bg.png) repeat-x 0 0;  height: 49px;  }
    .socials-inner { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/socials-inner.png) repeat-x 0 0; padding-left: 158px;}
    .socials h3 { float: left; font-size: 18px; line-height: 49px; padding-right: 19px; padding-bottom: 0; font-family: 'Ubuntu', sans-serif; font-weight: 500;  }
    .socials ul { list-style: none; list-style-position: outside; line-height: 49px;  }
    .socials ul li { font-size: 11px; padding-right: 18px;  color: #7c7c7c; background: transparent; text-transform: uppercase; float: left; }
    .socials ul li a { color: #7c7c7c; text-decoration: none; display: block; padding-left: 28px; position: relative;  }
    .socials ul li a span { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/socials.png) no-repeat 0 0; position: absolute; width: 20px; height: 20px; top: 13px; left: 0; }
    .socials ul li a:hover { color: #333; }

    .socials ul li a.facebook-ico span { background-position: 0 0; }
    .socials ul li a.twitter-ico span { background-position: -22px 0; }
    .socials ul li a.rss-feed-ico span { background-position: -44px 0; }
    .socials ul li a.myspace-ico span { background-position: -67px 0; }
    .socials ul li a.john-doe-123-ico span { background-position: -89px 0; }

    #footer { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/footer-cols.png) repeat 0 0; }
    #footer h2 { font-size: 23px; color: #fff; font-family: 'Ubuntu', sans-serif; font-weight: 400; padding-bottom: 18px;  }
    .footer-cols { padding: 46px 24px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/footer-lights.png) no-repeat center 0px; }
    .footer-cols .col { float: left; width: 195px; }
    .footer-cols .col + .col { padding-left: 54px;  }
    .footer-cols .col ul { list-style: none; list-style-position: outside; }
    .footer-cols .col ul li { color: #7dc33a; font-size: 16px;  padding-bottom: 4px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/arr-footer-col.png) no-repeat 0 8px; padding-left: 9px;  }
    .footer-cols .col ul li a { color: #7dc33a; }

    .footer-bottom { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/footer-bottom.png) repeat 0 0; height: 38px; padding-top: 24px; padding: 24px 20px 0; border-top: 1px solid #262c2c;  }
    .footer-bottom .footer-nav { float: left; line-height: 11px;  }
    .footer-bottom .footer-nav ul { list-style: none; list-style-position: outside; }
    .footer-bottom .footer-nav ul li { display: inline;  font-size: 11px; color: #9e9e9e; border-left: 1px solid #1a1f20; padding: 0 11px; }
    .footer-bottom .footer-nav ul li.first { padding-left: 0; border: 0;  }
    .footer-bottom .footer-nav ul li a { color: #5f6261; }
    .footer-bottom .footer-nav ul li a:hover,
    .footer-bottom .footer-nav ul li.active a { color: #9e9e9e; text-decoration: underline; }

    .footer-bottom p.copy { float: right; line-height: 11px; font-size: 11px; color: #5f6261; }
    .footer-bottom p.copy span { padding: 0  11px;  }
    .footer-bottom p.copy a { color: #2b9208; text-decoration: underline; }
    .footer-bottom p.copy a:hover { text-decoration: none; }
    .footer-bottom p.copy strong { font-weight: normal; }

    /* #Media Queries
    ================================================== */

    /* ipad portrait */
    @media only screen and ( min-width: 768px) and ( max-width: 980px ) {
        body { width: 768px; }
        .shell { width: 748px; }
        #navigation ul li a { padding: 0 22px;  }
        #navigation ul li.first a { padding-left: 26px; }

        .slider-holder { position: relative; }
        .slider-holder span.slider-b { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/t-slider-bottom.png) no-repeat 0 0;  width: 748px; height: 30px; position: absolute; bottom: -13px; left: 0px; z-index: 100;}
        .slider-holder span.slider-shadow { background: transparent; display: none;  }
        .flex-control-nav { left: 346px; }

        .slider { width: 748px; height: 292px; position: relative; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/t-slide-img.png) no-repeat 0 0;}
        .slider ul.slides { list-style: none; list-style-position: outside; }
        .slider ul.slides li { width: 748px  !important; height: 292px; float: left; position: relative; }

        .slider ul.slides li .img-holder { width: 537px; height: 266px; position: absolute; bottom: 0px; right: 0px; }
        .slider ul.slides li .img-holder img { width: 537px  !important; height: 266px  !important; }

        .slider ul.slides li .slide-cnt { width: 320px; padding: 0px 0 0 34px; }
        .slider ul.slides li .box-cnt { width: 285px; }
        .slider ul.slides li .slide-cnt h2 { font-size: 40px; line-height: 40px; padding-bottom: 16px; color: #fff; text-shadow: rgba(0,0,0,0.4) 0px 1px 2px; font-family: 'Ubuntu', sans-serif; font-weight: 700; }

        .main { padding: 47px 0 0 0;  }
        .main section { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/t-section-shadow.png) no-repeat center bottom; padding-left: 20px; padding-right: 20px;  }
        .main .cols { margin: 0 0 0 0; padding-left: 30px; padding-right: 22px;   }
        .main .cols .col { width: 188px; }
        .main .cols .col img { float: none; display: block; margin: 0 auto;  }
        .main .cols .col + .col { padding-left: 66px; }
        .main .cols .col-cnt {text-align: center; }

        .main .testimonial { background: transparent; }
        .main .post { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/t-section-post.png) no-repeat center bottom; padding-left: 20px ;  }
        .main .post .video-holder { width: 435px; height: 245px; float: none; display: block;  margin-right: 0px; margin-bottom: 20px;  }
        .main .post-cnt { float: none; display: block;  width: 100%; }

        .socials-inner { padding-left: 70px; }
        .footer-bottom { height: 58px; }
        .footer-cols { padding-left: 40px; }
        .footer-cols .col { width: 150px; }
        .footer-cols .col + .col { padding-left: 28px; }
        .footer-cols .col ul li { font-size: 12px; }

        .footer-bottom .footer-nav { float: none; display: block; text-align: center; padding-bottom: 18px;  }
        .footer-bottom p.copy { float: none; display: block; text-align: center;  }
    }


    @media only screen and ( max-width: 767px) {
        body { width: auto; }
        .shell { width: 320px; margin: 0 auto;  }
        #header { position: relative; z-index: 1000; padding-left: 0; padding-right: 0;  }
        #logo { float: none; display: block; margin: 0 auto; padding: 0 0 0 0;  }
        .search { display: none; }

        #navigation { padding: 0 0 0 0; height: 36px; }
        #navigation a.nav-btn { display: block; font-size: 13px; line-height: 36px;  padding-top: 0px; height: 28px; padding-left: 22px; text-transform: uppercase; color: #2b9208; font-size: 13px; font-family: 'Ubuntu', sans-serif; font-weight: 700; }
        #navigation a.nav-btn:hover { text-decoration: none; }
        #navigation a.nav-btn span.arr { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/nav-arr.png) no-repeat 0 0; width: 13px; height: 9px; position: absolute; right: 14px; top: 12px; }
        #navigation a.nav-btn span.arr.active { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/nav-arr.png) no-repeat 0 bottom; }

        #navigation { position: relative; z-index: 1000; }
        #navigation ul { display: none; position: absolute; top: 36px; left: 0;  width: 100%;}
        #navigation ul li { display: block; line-height: 36px !important; float: none; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/navigation.png) repeat 0 0;  }
        #navigation ul li a { padding: 0 22px; }
        #navigation ul li.first a { padding-left: 26px; display: none; }

        .m-slider { background: #f3f3f3;  }
        .slider-holder { position: relative; margin: 0 auto; width: 310px; }
        .slider-holder span.slider-b { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/m-slider-bottom.png) no-repeat 0 0; width: 310px; height: 12px; position: absolute; bottom: -3px; left: 0px; z-index: 100;}
        .slider-holder span.slider-shadow { background: transparent; display: none; }
        .flex-control-nav { left: 130px; }

        .slider { width: 310px; height: 181px; overflow: hidden; position: relative; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/m-slide-img.png) no-repeat 0 0;}
        .slider ul.slides li { width: 310px !important; height: 181px !important; float: none; }

        .slider ul.slides li .img-holder { width: 250px  !important; height: 134px  !important; bottom: -10px !important; left: 50%; margin-left: -145px;  }
        .slider ul.slides li .img-holder img { width: 250px  !important; height: 134px !important; }

        .slider ul.slides li .slide-cnt { width: 300px; margin: 0 auto;  padding: 0px 0 0 0px; }
        .slider ul.slides li .box-cnt { display: none; }
        .slider ul.slides li .slide-cnt h2 { font-size: 22px; text-align: center;  line-height: 25px; padding-bottom: 16px; color: #fff; text-shadow: rgba(0,0,0,0.4) 0px 1px 2px; font-family: 'Ubuntu', sans-serif; font-weight: 700; }
        .slider ul.slides li .slide-cnt a.grey-btn { display: none;  }

        .main { padding: 40px 0 0 0; }
        .main section { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/m-section-shadow.png) no-repeat center bottom; padding: 0 20px 20px 20px; }
        .main .cols { margin: 0 0 0 0; }
        .main .cols .col { width: 188px; float: none; display: block; padding-bottom: 22px; margin: 0 auto; }
        .main .cols .col img { float: none; display: block; margin: 0 auto; }
        .main .cols .col + .col { padding-left: 0px; }
        .main .cols .col-cnt { text-align: center; float: none; display: block;  }
        .main a.m-btn-grey { display: block; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/m-btn-grey.png) repeat-x 0 0; margin: 0 10px 14px;  height: 39px; text-align: center; line-height: 39px; border: 1px solid #9e9f9f; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; -o-border-radius: 6px; display: block; font-weight: bold; font-size: 18px;  color: #636363; text-shadow: rgba(255,255,255,0.4) 0px 1px 0px; }
        .main a.m-btn-grey:hover { background-position: 0 bottom; text-decoration: none; }

        .main .post  { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/m-section-post.png) no-repeat center bottom; padding-top: 28px; padding-left: 20px;   }
        .main .post .video-holder { width: 280px; height: 162px; float: none; display: block;  margin: 0 auto 20px;  }
        .main .post .video-holder img { width: 280px; height: 162px; }
        .main .post-cnt { float: none; display: block;  width: 100%; }
        .main .post-cnt p strong { display: block; padding-bottom: 12px; }

        .testimonial h2 { font-size: 21px; }
        .testimonial p.author { text-align: center; }

        .socials { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/socials-bg.png) repeat-x 0 0;  padding-bottom: 20px;  height: 100%; }
        .socials-inner { padding-left: 10px; }
        .socials h3 { float: none; display: block; }
        .socials ul li { display: block; float: none; line-height: 30px;  }
        .socials ul li a { display: block; float: none; }
        .socials ul li a span { top: 4px; }

        #footer h2 { padding-bottom: 12px; }
        .footer-cols { padding-left: 10px; padding-right: 0; padding-bottom: 0; }
        .footer-cols .col { width: 150px; float: none; display: block; padding-bottom: 22px; }
        .footer-cols .col + .col { padding-left: 0px; }
        .footer-cols .col ul li { font-size: 12px; }

        .footer-bottom { height: 58px; }
        .footer-bottom { padding: 10px 9px 20px; height: 100%; }

        .footer-bottom .footer-nav { float: none; display: block; text-align: center; padding: 0 0px 18px; }
        .footer-bottom .footer-nav ul li { padding: 0 4px; border: 0; font-size: 10px !important;  }

        .footer-bottom p.copy { float: none; display: block; text-align: center;  }
        .footer-bottom p.copy strong { display: block;  padding-top: 10px; }
        .footer-bottom p.copy span { display: none; }
    }

    @media only screen and ( max-width: 767px) and (-webkit-min-device-pixel-ratio: 1.5), only screen and (min--moz-device-pixel-ratio: 1.5), only screen and (min-resolution: 240dpi)  { 

        #navigation a.nav-btn span.arr { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/nav-arr@2x.png) no-repeat 0 0; -webkit-background-size: 13px 18px; -moz-background-size: 13px 18px; background-size: 13px 18px; }
        #navigation a.nav-btn span.arr.active { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/nav-arr@2x.png) no-repeat 0 bottom; -webkit-background-size: 13px 18px; -moz-background-size: 13px 18px; background-size: 13px 18px; }

        #logo a { background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/images/logo@2x.png) no-repeat 0 0; -webkit-background-size: 81px 33px; -moz-background-size: 81px 33px; background-size: 81px 33px;  }
    }
</style>