<?php
/* @var $this Controller */

$var2 = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.btsap311'));
Yii::app()->clientScript->registerCssFile($var2 . '/css/bootstrap.min.css');
Yii::app()->clientScript->registerCssFile($var2 . '/css/bootstrap-theme.min.css');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta name="description" content="Servicio de Transpote, Giros y Encomiendas"></meta>
        <meta name="keywords" content="Transporte, Viajes, Tours"></meta>
        <meta name="author" content="TRANSANI INVERSIONES Y TRANSPORTES"></meta>
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>
            $(document).ready(function () {
                fn_fechaTitulo();
            });
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

                $("#idFechaTitulo").html("Hoy es" + day + " " + myday + " de " + month);
            }
        </script>
    </head>

    <body style="background: #BDBDBD">
        <div class="container" id="page">

            <div class="row">
                <div class="col-sm-9">
                    <div id="logos"><?php echo '<img height="140px" src="' . Yii::app()->request->baseUrl . '/images/banner.png">'; ?></div>
                </div>
                <div class="col-sm-3">
                    <?php
                    if (!Yii::app()->user->isGuest) {
                        $usuar = Usuario::model()->findByAttributes(array('idusuario' => Yii::app()->user->getId()));
                        ?>
                        <div class="row" style= "padding-top:10px;">
                            <div class="col-md-12">
                                <div class="well" style="float:right;padding:5px;margin:0px;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="thumbnail"  href="#">
                                                <?php
                                                $avatar = Persona::model()->findByAttributes(array('idpersona' => $usuar->idpersona))->foto;
                                                if ($avatar)
                                                    echo '<img alt="image" height="60px"  class="img-responsive" src="' . Yii::app()->request->baseUrl . '/index.php/Persona/Verfoto/' . $usuar->idpersona . '">';
                                                else {

                                                    if ($usuar->usu_sexo == "F") {
                                                        echo '<img height="110px" src="' . Yii::app()->request->baseUrl . '/images/perfilfem.jpg">';
                                                    } else {
                                                        echo '<img height="110px" src="' . Yii::app()->request->baseUrl . '/images/perfilmas.jpg">';
                                                    }
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="media-heading">
                                                        <?php echo $usuar->idpersona0->nombres . ' ' . $usuar->idpersona0->apellidos; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><span class="label label-info"><span class="glyphicon glyphicon-eye-open"></span> 
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Usuario/<?php echo $usuar->idusuario; ?>" style="color:#ffffff;cursor:pointer" onmouseover="this.style.color = '#ff0000'" onmouseout = "this.style.color = '#ffffff'">Ver Perfil</a></span>
                                                        <span class="label label-warning"><span class="glyphicon glyphicon-off"></span>
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/logout" style="color:#ffffff;cursor:pointer" onmouseover="this.style.color = '#ff0000'" onmouseout = "this.style.color = '#ffffff'"> Salir</a></span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id ="idFechaTitulo" style= 'font-family: "Franklin Gothic Medium","Franklin Gothic","ITC Franklin Gothic",Arial,sans-serif;color: #428bca;'></div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="row">

                <div id="mainmenu">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'encodeLabel' => false,
                        'items' => array(
                            array('label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio', 'url' => array('/site/index')),
                            array('label' => '<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Horarios', 'url' => array('/Horario/index')),
                            array('label' => '<span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Ciudades', 'url' => array('/Ciudad/index')),
                            array('label' => '<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Vehículos', 'url' => array('/Bus/index')),
                            array('label' => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Reporte Gráfico', 'url' => array('/Boleto/rpte_grafico_destinos')),
                            array('label' => '<span class="glyphicon glyphicon-tower" aria-hidden="true"></span> Empresa', 'url' => array('/Empresa/index')),
                            array('label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Clientes', 'url' => array('/Cliente/index')),
                            array('label' => '<span class="glyphicon glyphicon-pawn" aria-hidden="true"></span> Personal', 'url' => array('/Persona/index')),
                            array('label' => '<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Sede', 'url' => array('/Sede/index')),
                            array('label' => '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Iniciar sesion', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => '<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>

                <?php echo $content; ?>

                <div class="clear"></div>

                <div id="footer">
                    Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                    All Rights Reserved.<br/>
                    <?php echo Yii::powered(); ?>
                </div><!-- footer -->
            </div>
        </div><!-- page -->
    </body>
</html>
