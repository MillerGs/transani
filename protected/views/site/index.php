<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php
/* @var $this PERSPersonalController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs = array(
    'Cuadro Nominativo',
);
?>
<?php
if (!Yii::app()->user->isGuest) {
    ?>
    <?php
    $var1 = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
    Yii::app()->clientScript->registerScriptFile($var1 . '/scripts/jquery-1.11.1.min.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxcore.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxdata.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxtabs.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxcheckbox.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxdatetimeinput.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxcalendar.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxbuttons.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxscrollbar.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxpanel.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxmenu.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxlistbox.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxnavigationbar.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.selection.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.filter.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.sort.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxtree.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxwindow.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxlistbox.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.pager.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.columnsresize.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxexpander.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxcheckbox.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxdragdrop.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxbuttons.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxgrid.edit.js');
    Yii::app()->clientScript->registerScriptFile($var1 . '/jqwidgets/jqxdropdownlist.js');
    Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.base.css');
    Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.arctic.css');
    Yii::app()->clientScript->registerCssFile($var1 . '/jqwidgets/styles/jqx.ui-start.css');
    ?>

    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 0.4em 0.4em  0.4em !important;
            margin: 0.3em 0 0.2em 0.3em !important;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 0.9em !important;
            font-weight: bold !important;
            text-align: left !important;

        }
        legend.scheduler-border {
            width:inherit; /* Or auto */
            height:1px;
            padding:0 4px; /* To give a bit of padding on the left and right */
            border-bottom:none;
        }

        .status {
            font-family: 'Source Sans Pro', sans-serif;
        }
        .status .panel-title {
            font-family: 'Oswald', sans-serif;
            font-size: 72px;
            font-weight: bold;
            color: #fff;
            line-height: 45px;
            padding-top: 0px;
            letter-spacing: -0.8px;
        }
        .panel-danger > .panel-heading {
            color: #b94a48;
            background-color: #c71c22;
            border-color: #dddddd;
        }
        .panel-danger {
            border-color: #dddddd;
        }
        .panel {
            margin-bottom: 20px;
            background-color: #ffffff;
            border: 1px solid transparent;
            border-radius: 4px; 
        }
        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

    </style>

    Rutas
    <?php echo CHtml::dropDownList("cboRutas", 'idruta', CHtml::listData(Ruta::model()->findAll("idoficina=" + Usuario::model()->findByPk(Yii::app()->user->id)->idoficina), 'idruta', 'ruta_desc'), array('prompt' => '--Seleccione ruta--', 'onchange' => 'fn_actualizar_titulo_boleta()'));
    ?>

    <?php //echo Usuario::model()->findByPk(Yii::app()->user->id)->idoficina; ?>
    
    <button type="button" id="btnBusqueda" onclick = "fn_SeleccionarPersonal()" class="btn">Horarios</button>
    <button type="button" id="btnBoletosEmitidos" onclick = "fn_ver_boletos_emitidos()" class="btn">Ver Boletos emitidos</button>
    <img width="20" height="20" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_reloj.png" />
    <div id="contenedor_reloj" style='display:inline;font-family: "Arial Black","Arial Bold",Gadget,sans-serif;'></div> 
    <input type="hidden"  id="txtidhorario" value="">
    <input type="hidden"  id="txtorigen" value="">
    <input type="hidden"  id="txtidbus" value="">

    <div class="col-md-9" id="idviii"> 
        <div id='jqxNavigationBar2'>
            <div> 
                <button class="btn btn-primary" type="button" style="width:500px;text-align:left" id="tituloBoleto">
                    Boleto <span class="badge" id="tipobus"></span>
                </button>
            </div>
            <div> 
                <table style="vertical-align:top">
                    <tr>
                        <td class="col-md-12">
                            <fieldset class="scheduler-border"  style="font-family: Calibri,Candara;">
                                      <legend class="scheduler-border" >Cabecera de boleto</legend> 

                                <div class="row" >
                                    <div class="col-md-2">
                                        BUSS
                                    </div>
                                    <div class="col-md-3" >
                                        <input type="text" style="width:100px;color: blue" name="txtbus" id="txtbus" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        LIBRES
                                    </div>
                                    <div class="col-md-1" >
                                        <input type="text" style="width:40px;color: red;text-align:right;" name="txtlibres" id="txtlibres" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        HORA SALIDA
                                    </div>
                                    <div class="col-md-2" > 
                                        <div type="text" style='color: red;font-family: "Franklin Gothic Medium","Franklin Gothic","ITC Franklin Gothic",Arial,sans-serif;'  name="txthorasalida" id="txthorasalida" ></div>
                                    </div>  			
                                </div>
                                <div class="row" style="padding-top:5px;">
                                    <div class="col-md-2" >
                                        PILOTO
                                    </div>
                                    <div class="col-md-3" >
                                        <input type="text" style="width:100%;" name="txtpiloto" id="txtpiloto" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        VENDIDOS
                                    </div>
                                    <div class="col-md-1" >
                                        <input type="text" style="text-align:right;width:40px;" name="txtvendidos" id="txtvendidos" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        DIA
                                    </div>
                                    <div class="col-md-2" > 
                                        <input type="text" style="width:70px;" name="txtdia" id="txtdia" class="span2 search-query" disabled>
                                    </div>  			
                                </div>
                                <div class="row" style="padding-top:5px;">
                                    <div class="col-md-2" >
                                        COPILOTO
                                    </div>
                                    <div class="col-md-3" >
                                        <input type="text" style="width:100%;" name="txtcopiloto" id="txtcopiloto" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        RESERVADOS
                                    </div>
                                    <div class="col-md-1" >
                                        <input type="text" style="text-align:right;width:40px;color: red" name="txtreservados" id="txtreservados" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        FECHA DE VIAJE
                                    </div>
                                    <div class="col-md-2" > 
                                        <input type="text" style="width:70px;" name="txtfechaviaje" id="txtfechaviaje" class="span2 search-query" disabled>
                                    </div>  			
                                </div>
                                <div class="row" style="padding-top:5px;">
                                    <div class="col-md-4" > 
                                        <h4><span style="width:100%;text-align:left" class="label label-info">
                                                Terminal terrestre -Trujillo 
                                            </span></h4>
                                        </button>
                                    </div> 
                                    <div class="col-md-2" >
                                        Total Asientos
                                    </div>
                                    <div class="col-md-1" >
                                        <input type="text" style="text-align:right;width:40px;" name="txtTotalAsientos" id="txtTotalAsientos" class="span2 search-query" disabled>
                                    </div>
                                    <div class="col-md-2" >
                                        Hora Partida Ini.
                                    </div>
                                    <div class="col-md-2" > 
                                        <input type="text" style="width:70px;" name="txtHoraPartida" id="txtHoraPartida" class="span2 search-query" disabled>
                                    </div>  			
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">	 

                            </div>	
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-6" style="width:400px;margin-top:19px;" >
                            <div id='jqxTabs'>
                                <ul>
                                    <li style="margin-left: 30px;">
                                        VENTA BOLETO 
                                        <div style="float: left;">
                                            <img width="16" height="16" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_boletos.png" />
                                        </div>
                                    </li>
                                    <li>RESERVAS
                                        <div style="float: left;">
                                            <img width="16" height="16" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_reserva.png" />
                                        </div>
                                    </li> 
                                    <li>POSTERGACION
                                    </li> 
                                    <li>CANCELAR BOLETO
                                        <div style="float: left;">
                                            <img width="16" height="16" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_Error.gif" />
                                        </div></li> 
                                    <li>REIMPRESION
                                        <div style="float: left;">
                                            <img width="16" height="16" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_impresion.png" />
                                        </div></li> 
                                </ul>	
                                <div style="background: #EFEFFB">
                                    <div class="col-md-9">
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                BOLETO :
                                            </div>
                                            <div class="col-md-9" style='display:inline;'>
                                                <div type="text" style='display:inline;color: red;font-family: "Franklin Gothic Medium","Franklin Gothic","ITC Franklin Gothic",Arial,sans-serif;'  name="txtserie" id="txtserie" >
                                                    <?php echo Usuario::model()->findByPk(Yii::app()->user->id)->idoficina0->idsede0->serie; ?>
                                                </div> 
                                                <div type="text" style='display:inline;color: red;font-family: "Franklin Gothic Medium","Franklin Gothic","ITC Franklin Gothic",Arial,sans-serif;' >-</div>
                                                <div type="text" style='display:inline;color: red;font-family: "Franklin Gothic Medium","Franklin Gothic","ITC Franklin Gothic",Arial,sans-serif;'  name="txtnroboleto" id="txtnroboleto" ></div>
                                            </div>	 
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                DOCUMENTO :
                                            </div>
                                            <div class="col-md-9" >
                                                <?php echo CHtml::dropDownList("cboTipoDoc", 'tipo_bus', array('1' => 'DNI', "2" => 'LIBRETA MILITAR', "3" => 'PARTIDA DE NACIMIENTO', "4" => 'PASAPORTE', "5" => 'CARNET DE IDENTIDAD'), array('style' => 'width:150px;')); ?> 
                                                <input type="text" style="width:170px;" name="txtnrodoc" id="txtnrodoc" class="span2 search-query"  >

                                                <p class="text-info" id="cargandoDatosCliente" style="display:none;">
                                                    <img align="absmiddle" style="display:inline;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/spinner.gif"/>      
                                                </p>
                                                <!--<input type="hidden" id="txtidpersona" value="1">-->
                                                <input type="hidden"  id="txtidpersona" value="">
                                            </div>	
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                NOMBRES :
                                            </div>
                                            <div class="col-md-9" > 
                                                <input type="text" style="width:170px;" name="txtapellidos" id="txtapellidos" class="span2 search-query"  placeholder="APELLIDOS">
                                                <input type="text" style="width:170px;" name="txtnombres" id="txtnombres" class="span2 search-query"  placeholder="NOMBRES">
                                            </div>	
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                EDAD :
                                            </div>
                                            <div class="col-md-9" > 
                                                <input type="text" style="width:70px;" name="txtedad" id="txtedad" class="span2 search-query" > 
                                            </div>	
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                DESTINO :
                                            </div>
                                            <div class="col-md-9" > 
                                                <?php echo CHtml::dropDownList("cbodestino", 'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'idciudad', 'ciudaddesc'), array('prompt' => '--Seleccione ruta--'));
                                                ?>
                                            </div>	
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                PRECIO :
                                            </div>
                                            <div class="col-md-9" > 
                                                <input type="text" style="text-align:right;width:90px;color: blue" name="txtprecio" id="txtprecio" class="span2 search-query" disabled> S/
                                            </div>	
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                RUC :
                                            </div>
                                            <div class="col-md-9" > 
                                                <input type="text" style="width:140px;" name="txtruc" id="txtruc" value="<?php echo Usuario::model()->findByPk(Yii::app()->user->id)->idpersona0->idempresa0->ruc; ?>" class="span2 search-query" disabled> 
                                            </div>	
                                        </div>
                                        <div class="col-md-12" style="padding-top:5px;">
                                            <div class="col-md-3" style="text-align:right;">
                                                RAZÓN SOCIAL :
                                            </div>
                                            <div class="col-md-9" > 
                                                <input type="text" style="width:270px;" name="txtrazonsocial" id="txtrazonsocial" value="<?php echo Usuario::model()->findByPk(Yii::app()->user->id)->idpersona0->idempresa0->razon; ?>" class="span2 search-query" disabled> 
                                                <button type="button" id="btnEditarPlanilla" onclick = "fn_guardarBoleto()" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-print"></span> Guardar </button>  
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="col-md-3" > 
                                        <div class=" col-md-12"id="cart" style="margin-top:10px;padding-top:13px;border:4px dashed #aaa;"> 
                                            <div class="panel status panel-danger">
                                                <div class="panel-heading">
                                                    <h1 class="panel-title text-center" id="idsetnroasiento">0</h1>
                                                </div>
                                                <div class="panel-body text-center">                        
                                                    <strong>Arrastre aqui el asiento</strong>
                                                </div>
                                            </div>

                                        </div> 
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12" style="padding-top:5px;">
                                        <div class="col-md-3" style="text-align:right;">
                                            NOMBRE COMPLETO :
                                        </div>
                                        <div class="col-md-9" > 
                                            <input type="text" style="width:170px;" name="txtnombresR" id="txtnombresR" class="span2 search-query"  placeholder="NOMBRE COMPLETO">
                                            <button type="button"  onclick = "fn_guardarReservacion()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Reservación</button>

                                        </div>	
                                    </div>
                                    <div class="col-md-12" id='cartgrilla' style="padding-top:5px;">
                                        <div id="jqxgridReserv"></div>
                                    </div>
                                </div>
                                <div>
                                </div>
                                <div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-12">
                            <div id="jqxgridTareaje"  style="margin-top:10px;"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="popupVerMicroAsientos">
            <div id="descTituloBus">Micro Modelo</div>
            <div style="overflow: hidden;" id="designmicro"> 

            </div> 
        </div>
        <div class="btnnroasss"></div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            HoraActual();
            gridRenderingReservaciones();
            $("#jqxNavigationBar2").jqxNavigationBar({width: '100%', height: 550});
            $('.btnnroasss').jqxDragDrop({dropTarget: $('#cart'), revert: true});
            addEventListeners();
            $("#popupmsjAlerta").jqxWindow({
                width: 300, height: 100, resizable: false, isModal: true, autoOpen: false, cancelButton: $("#btnsalirMsj"), modalOpacity: 0.5
            });
            $("#popupVerDetalleAsiento").jqxWindow({
                width: 300, height: 300, resizable: false, isModal: true, autoOpen: false, cancelButton: $("#btnsalirMsj"), modalOpacity: 0.5
            });
            $("#popupVerMicroAsientos").jqxWindow({
                width: 300, draggable: true, height: 1000, resizable: false, isModal: false, autoOpen: false, modalOpacity: 0
            });
            $("#cboRutas").change(function () {
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Persona/Buscar_ruta_x_id'); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        idruta: $('#cboRutas option:selected').val()
                    },
                    success: function (data) {

                        $("#cbodestino").val(data.destino);
                        $("#txtorigen").val(data.origen);

                    },
                    error: function (xhr) {
                        alert("falló " + xhr.readyState + this.url)

                    }
                });
            });
            $('#jqxTabs').jqxTabs({width: '100%', height: 270, position: 'top', theme: "ui-start"});
            $('#jqxTabs').on('selecting', function (event) {

                if (event.args.item == 0) {
                    $('.btnnroasss').jqxDragDrop({dropTarget: $('#cart'), revert: true});
                }
                if (event.args.item == 1) {
                    $('.btnnroasss').jqxDragDrop({dropTarget: $('#cartgrilla'), revert: true});
                }
            });
            var offset = $("#cboRutas").offset();
            $("#popupVerHorarios").jqxWindow({
                position: {x: parseInt(offset.left) + 10, y: parseInt(offset.top) - 140},
                //theme:"ui-smoothness",
                width: 2000, height: 580, resizable: false, isModal: true, autoOpen: false, cancelButton: $("#btnsalircat"), modalOpacity: 0.5
            });
            $("#popupVerBoletos").jqxWindow({
                position: {x: parseInt(offset.left) + 10, y: parseInt(offset.top) - 140},
                //theme:"ui-smoothness",
                width: 2000, height: 580, resizable: false, isModal: true, autoOpen: false, cancelButton: $("#btnsalircat"), modalOpacity: 0.5
            });
            fn_GenerarNumBoleto();

        });
        $("#txtnrodoc").keypress(function (event) {
            $("#txtidpersona").val("");
            $("#txtnombres").val("");
            $("#txtapellidos").val("");
            $("#txtedad").val("");
            if (event.which == 13) {
                fn_BuscarDatosCliente_x_nrodoc();
            }

        });
        function fn_SeleccionarPersonal() {
            $("#popupVerHorarios").jqxWindow('open');
            CargarGrillaseleccionPersonal();
        }
        function gridRenderingReservaciones() {
            $("#jqxgridReserv").jqxGrid(
                    {
                        height: 190,
                        width: 300,
                        keyboardnavigation: false,
                        selectionmode: 'none',
                        columns: [
                            //{ text: 'Item', dataField: 'name', width: "20%" },
                            {text: 'Asiento N°', dataField: 'asiento', width: "70%"},
                            {text: 'Eliminar', dataField: 'remove', width: "30%"}
                        ]
                    });
            $("#jqxgridReserv").bind('cellclick', function (event) {
                var index = event.args.rowindex;
                if (event.args.datafield == 'remove') {
                    removeGridRow(index);
                    //updatePrice(-item.price);
                }
            });
        }
        ;
        function removeGridRow(id) {
            var rowID = $("#jqxgridReserv").jqxGrid('getrowid', id);
            $("#jqxgridReserv").jqxGrid('deleterow', rowID);
        }
        ;

        function fn_validarReservacion() {
            if ($("#txtnombresR").val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Ingrese el nombre del q solicita.", "#txtnombresR", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            var datainformations = $("#jqxgridReserv").jqxGrid("getdatainformation");
            var rowscounts = datainformations.rowscount;
            if (rowscounts == 0) {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Arrastre un asiento a la grilla.", "#jqxgridReserv", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            return true;
        }
        function fn_guardarReservacion() {
            if (fn_validarReservacion()) {
                //var rowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
                //var data1 = $('#jqxgrid').jqxGrid('getrowdata', rowindex);
                var rubs = '{\"items\":[';

                var rows = $('#jqxgridReserv').jqxGrid('getrows');
                for (i = 0; i < rows.length; i++)
                {
                    var data = $('#jqxgridReserv').jqxGrid('getrowdata', i);
                    rubs = rubs + '{\"asiento\":\"' + data.asiento + '\",\"id\":\"' + '1' + '\"},';
                }
                rubs = rubs.substring(0, rubs.length - 1);
                rubs = rubs + "]}";
                $.ajax({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('Horario/CreateReservacion'); ?>",
                    cache: false,
                    //data:  {val1:1,val2:2},
                    data: {
                        idhorario: $("#txtidhorario").val(),
                        cliente: $("#txtnombresR").val(),
                        detalle: rubs
                    },
                    beforeSend: function () {

                        $("#cargando").css("display", "inline");
                    },
                    success: function (msg) {
                        $("#cargando").css("display", "none");

                        fn_btn_seleccionarHorario();


                        $("#imgEstadoasiento" + $('#idsetnroasiento').html()).html('<img style="display:inline;" height="20px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_usuario.png">');

                        $("#txtnrodoc").val("");
                        $("#txtnombres").val("");
                        $("#txtapellidos").val("");
                        $("#txtedad").val("");
                        $("#idsetnroasiento").val("0");
                        $("#txtnombresR").val("");
                        $('.panel-danger>.panel-heading').css('background-image', 'webkit-linear-gradient(top,#f2dede 0,#ebcccc 100%)');
                        $('.panel-danger>.panel-heading').css('background-image', 'linear-gradient(to bottom,#f2dede 0,#ebcccc 100%)');
                        $('.panel-danger>.panel-heading').css('background-repeat', 'repeat-x');


                        fn_iniciarPoputmsj("ico_success.jpg", "Se ha realizado la reservación.", "#txtnombresR", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                        CargarGrillaseleccionPersonal();
                        /*var ssss=$('#txtlibres').val();
                         $('#txtlibres').val(ssss-1);
                         ssss=$('#txtvendidos').val();
                         $('#txtvendidos').val(ssss+1);*/
                        return;

                        //alert(msg);
                    },
                    error: function (xhr) {
                        alert("failure" + xhr.readyState + this.url)

                    }
                });
            }

        }
        function fn_ver_boletos_emitidos() {
            $("#popupVerBoletos").jqxWindow('open');
        }
        function fn_actualizar_titulo_boleta() {
            $('#tituloBoleto').html($('#cboRutas option:selected').text() + '  <span class="badge" id="tipobus"></span>');
        }
        function fn_btn_seleccionarHorario() {
            var rowindex = $('#jqxgridseleccionarTrabajador').jqxGrid('getselectedrowindex');

            if (rowindex != -1) {
                var data = $('#jqxgridseleccionarTrabajador').jqxGrid('getrowdata', rowindex);
                $('#txtidbus').val(data.idbus);
                $('#tipobus').html(data.tipo_bus);
                $('#txtbus').val(data.placa);
                $('#txtpiloto').val(data.piloto);
                $('#txtcopiloto').val(data.copiloto);
                $('#txtlibres').val(data.asientos_libres);
                $('#txtvendidos').val(data.asientos_vendidos);
                $('#txtreservados').val(0);
                $('#txthorasalida').html(data.hora_sal);
                $('#txtdia').val(data.fecha_sal);
                $('#txtfechaviaje').val(data.fecha_sal);
                $('#txtTotalAsientos').val(data.nros_asientos);
                $('#txtHoraPartida').val(data.hora_sal);
                $('#txtprecio').val(data.precio);
                $("#txtidhorario").val(data.idhorario)
                //buscar diseño de micro
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Horario/VerDesignMircro'); ?>",
                    type: 'post',
                    data: {
                        idbus: data.idbus,
                        idhorario: data.idhorario
                    },
                    success: function (data) {

                        $("#designmicro").html(data);
                        var offset = $("#jqxNavigationBar2").offset();
                        $("#popupVerMicroAsientos").jqxWindow({cancelButton: $("#btnsalirMsj"),
                            position: {x: parseInt(offset.left) + $('#idviii').width() + 10, y: parseInt(offset.top) - 5}});
                        $("#popupVerMicroAsientos").jqxWindow('open');


                        //$("#imgEstadoasiento2").html('<img style="display:inline;" height="20px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_usuario.png">');
                        for (i = 0; i < 100; i++) {
                            $.ajax({
                                url: "<?php echo Yii::app()->createUrl('Horario/VerificarAsiento'); ?>",
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    nro: i,
                                    idhorario: $("#txtidhorario").val()
                                },
                                success: function (data) {
                                    if (data.estado == 1)
                                        $("#imgEstadoasiento" + data.nro).html('<img style="display:inline;" height="20px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_usuario.png">');
                                    if (data.estado == 2)
                                        $("#imgEstadoasiento" + data.nro).html('<img style="display:inline;" height="20px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_asiento_reser.png">');

                                },
                                error: function (xhr) {
                                    //alert("falló "+xhr.readyState+this.url)

                                }

                            });
                        }
                        $('.btnnroasss').jqxDragDrop({dropTarget: $('#cart'), revert: true});
                        addEventListeners();
                    },
                    error: function (xhr) {
                        alert("falló " + xhr.readyState + this.url)

                    }
                });

                $("#popupVerHorarios").jqxWindow('close');
            } else {
                alert("Seleccione un item de la grilla");
            }
        }
        function fn_GenerarNumBoleto() {

            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Persona/GenerarNumBoleto'); ?>",
                type: 'post',
                success: function (data) {

                    $("#txtnroboleto").html(data);

                },
                error: function (xhr) {
                    alert("falló " + xhr.readyState + this.url)

                }
            });

        }
        function fn_BuscarDatosCliente_x_nrodoc() {

            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Persona/Buscar_x_nrodoc'); ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    nrodoc: $("#txtnrodoc").val()
                },
                beforeSend: function () {

                    $("#cargandoDatosCliente").css("display", "inline");
                },
                success: function (arreglo) {
                    $("#cargandoDatosCliente").css("display", "none");
                    $("#txtapellidos").val(arreglo.apellidos)
                    $("#txtnombres").val(arreglo.nombres)
                    $("#txtedad").val(arreglo.edad)
                    $("#txtidpersona").val(arreglo.idcliente);
                },
                error: function (xhr) {
                    $("#cargandoDatosCliente").css("display", "none");
                    alert("falló " + xhr.readyState + this.url)

                }
            });

        }
        onCart1 = false;
        onCart2 = false;
        function addEventListeners() {
            $('.btnnroasss').mouseenter(function () {
            });
            $('.btnnroasss').mouseleave(function () {
            });
            $('.btnnroasss').bind('dropTargetEnter', function (event) {
                $(event.args.target).css('border', '4px solid #000');

                var selectedItem = $('#jqxTabs').jqxTabs('selectedItem');

                onCart1 = true;

                onCart2 = true;

                $(this).jqxDragDrop('dropAction', 'none');
            });
            $('.btnnroasss').bind('dropTargetLeave', function (event) {
                $(event.args.target).css('border', '4px solid #aaa');
                var selectedItem = $('#jqxTabs').jqxTabs('selectedItem');

                onCart1 = false;

                onCart2 = false;
                $(this).jqxDragDrop('dropAction', 'default');
            });
            $('.btnnroasss').bind('dragEnd', function (event) {
                var selectedItem = $('#jqxTabs').jqxTabs('selectedItem');

                if (selectedItem == 0) {
                    $('#cart').css('border', '4px dashed #aaa');
                    if ($('#imgEstadoasiento' + event.args.nroas).html() != "") {
                        alert("Este asiento ya se encuentra Ocupado,elija otro");
                    } else {


                        addItem({nroas: event.args.nroas});
                        onCart1 = false;


                    }
                }
                if (selectedItem == 1) {
                    $('#cartgrilla').css('border', '4px dashed #aaa');
                    if ($('#imgEstadoasiento' + event.args.nroas).html() != "") {
                        alert("Este asiento ya se encuentra Ocupado,elija otro");
                    } else {

                        item = {
                            name: event.args.nroas,
                            count: 1,
                            asiento: event.args.nroas,
                            remove: '<div style="text-align: center; cursor: pointer; width: 53px;"' +
                                    'id="draggable-demo-row-' + event.args.nroas + '">X</div>'
                        };
                        $("#jqxgridReserv").jqxGrid('addrow', null, item);
                        onCart2 = false;

                    }

                }
            });
            $('.btnnroasss').bind('dragStart', function (event) {
                var selectedItem = $('#jqxTabs').jqxTabs('selectedItem');
                var nroasiento = $(this).find('.class_asientoDesc').text();
                if (selectedItem == 0) {
                    //price = $(this).find('.draggable-demo-product-price').text().replace('Price: $', '');
                    $('#cart').css('border', '2px solid #aaa');
                    //price = parseInt(price, 10);

                }
                if (selectedItem == 1) {
                    $('#cartgrilla').css('border', '2px solid #aaa');

                }
                $(this).jqxDragDrop('data', {
                    nroas: nroasiento
                });

            });
        }


        function addItem(item) {
            $("#idsetnroasiento").html(item.nroas);
            $('.panel-danger>.panel-heading').css('background-image', '-webkit-linear-gradient(top,#c71c22 0,#b94a48 100%)');
            $('.panel-danger>.panel-heading').css('background-image', 'linear-gradient(to bottom,#c71c22 0,#b94a48 100%)');
            $('.panel-danger>.panel-heading').css('background-repeat', 'repeat-x');
            /*var index = getItemIndex(item.name);
             if (index >= 0) {
             cartItems[index].count += 1;
             updateGridRow(index, cartItems[index]);
             } else {
             var id = cartItems.length,
             item = {
             name: item.name,
             count: 1,
             price: item.price,
             index: id,
             remove: '<div style="text-align: center; cursor: pointer; width: 53px;"' +
             'id="draggable-demo-row-' + id + '">X</div>'
             };
             cartItems.push(item);
             addGridRow(item);
             }
             updatePrice(item.price);*/
        }
        ;
        function fn_guardarBoleto() {
            if (fn_validarBoleto()) {
                //var rowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
                //var data1 = $('#jqxgrid').jqxGrid('getrowdata', rowindex);

                $.ajax({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('Horario/CreateBoleto'); ?>",
                    //data:  {val1:1,val2:2},
                    data: {
                        idboleto: '',
                        serie: $('#txtserie').html().trim(),
                        numero: $("#txtnroboleto").html(),
                        tipo_doc: 1,
                        ruc: $('#txtruc').val(),
                        razon_social: $('#txtrazonsocial').val(),
                        idcliente: $('#txtidpersona').val(),
                        nombres: $('#txtnombres').val(),
                        apellidos: $('#txtapellidos').val(),
                        nrodoc: $('#txtnrodoc').val(),
                        edad: $('#txtedad').val(),
                        origen: $("#cbodestino option:selected").val(),
                        destino: $("#txtorigen").val(),
                        nroasiento: $('#idsetnroasiento').html(),
                        fechaviaje: $('#txtfechaviaje').val(),
                        horaviaje: $('#txtHoraPartida').val(),
                        precio: $('#txtprecio').val(),
                        idbus: $('#txtidbus').val(),
                        idhorario: $("#txtidhorario").val()
                    },
                    beforeSend: function () {

                        $("#cargando").css("display", "inline");
                    },
                    success: function (msg) {
                        $("#cargando").css("display", "none");

                        if (msg == "1") {
                            fn_btn_seleccionarHorario();


                            $("#imgEstadoasiento" + $('#idsetnroasiento').html()).html('<img style="display:inline;" height="20px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico_usuario.png">');

                            $("#txtnrodoc").val("");
                            $("#txtnombres").val("");
                            $("#txtapellidos").val("");
                            $("#txtedad").val("");
                            $("#idsetnroasiento").val("0");
                            $('.panel-danger>.panel-heading').css('background-image', 'webkit-linear-gradient(top,#f2dede 0,#ebcccc 100%)');
                            $('.panel-danger>.panel-heading').css('background-image', 'linear-gradient(to bottom,#f2dede 0,#ebcccc 100%)');
                            $('.panel-danger>.panel-heading').css('background-repeat', 'repeat-x');


                            fn_iniciarPoputmsj("ico_success.jpg", "Boleto guardado.", "#btnEditarPlanilla", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                            CargarGrillaseleccionPersonal();
                            var ssss = $('#txtlibres').val();
                            $('#txtlibres').val(ssss - 1);
                            ssss = $('#txtvendidos').val();
                            $('#txtvendidos').val(ssss + 1);
                            return;
                        }
                        if (msg == "2") {
                            alert("Ocurrio un error al guarda");
                            return;
                        }
                        if (msg == "3") {
                            alert("No se pudo registrar el cliente");
                            return;
                        }
                        //alert(msg);
                    },
                    error: function (xhr) {
                        alert("failure" + xhr.readyState + this.url)

                    }
                });
            }

        }
        function fn_validarBoleto() {
            if ($('#cboRutas option:selected').val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Seleccione una ruta.", "#cboRutas", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($("#txtidhorario").val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "No ha seleccionado un horario.", "#btnBusqueda", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($("#idsetnroasiento").html().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Arrartre un asiento para continuar.", "#cart", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            var nroasien = $("#idsetnroasiento").html();

            if (nroasien == 0)
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Arrartre un asiento para continuar.", "#cart", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($("#txtapellidos").val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Ingrese los apellidos.", "#txtapellidos", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($("#txtnombres").val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Ingrese los nombres.", "#txtnombres", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($("#txtedad").val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Ingrese la edad.", "#txtedad", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($("#txtnrodoc").val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Ingrese el nro de documento.", "#txtnrodoc", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            if ($('#cbodestino option:selected').val().trim() == "")
            {
                fn_iniciarPoputmsj("ico_alerta.jpg", "Seleccione el destino.", "#cbodestino", "$('#popupmsjAlerta').jqxWindow('close')", "Aceptar");
                $("#btnsalirMsj").css("display", "none");
                return false;
            }
            return true;
        }
        function fn_iniciarPoputmsj(imagen, msj, control, funcion, btnok) {
            msj = '<div class="col-md-2">' +
                    '<img  src="<?php echo Yii::app()->request->baseUrl . "/images/'+imagen+'"; ?>"/>' +
                    '</div>' +
                    '<div class="col-md-10">' +
                    '<div class="row">' +
                    '<div class="col-md-12"> ' + msj +
                    '</div>' +
                    '</div>' +
                    '<div class="row" style="padding-top:5px;">' +
                    '<div class="col-md-12">' +
                    '<button type="button" onclick="' + funcion + '" class="btn btn-xs btn-default">' +
                    '<span class="glyphicon glyphicon-check"></span>' + btnok +
                    '</button>' +
                    '<button type="button" id="btnsalirMsj"  class="btn btn-xs btn-default">' +
                    '<span class="glyphicon glyphicon-share"></span>Cancelar' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            $("#mostrarmsjj").html(msj);
            var offset = $(control).offset();
            $("#popupmsjAlerta").jqxWindow({cancelButton: $("#btnsalirMsj"),
                position: {x: parseInt(offset.left) + 10, y: parseInt(offset.top) + 10}});
            $("#popupmsjAlerta").jqxWindow('open');
        }
        function HoraActual() {
            var esteMomento = new Date();
            var hora = esteMomento.getHours();
            if (hora < 10)
                hora = '0' + hora;
            var minuto = esteMomento.getMinutes();
            if (minuto < 10)
                minuto = '0' + minuto;
            var segundo = esteMomento.getSeconds();
            if (segundo < 10)
                segundo = '0' + segundo;
            HoraCompleta = hora + " : " + minuto + " : " + segundo;
            document.getElementById('contenedor_reloj').innerHTML = HoraCompleta;
            setTimeout("HoraActual()", 1000)
        }
        function fn_verDetalleAsiento(asientonro) {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Horario/verDetalleAsiento'); ?>",
                //data:  {val1:1,val2:2},
                data: {
                    asientonro: asientonro,
                    idhorario: $("#txtidhorario").val()
                },
                beforeSend: function () {

                },
                success: function (msg) {
                    $("#form_contenido_asiento_detalle").html(msg);
                    $("#popupVerDetalleAsiento").jqxWindow({cancelButton: $("#btnsalirMsj")});
                    $("#popupVerDetalleAsiento").jqxWindow('open');
                },
                error: function (xhr) {
                    alert("failure" + xhr.readyState + this.url)

                }
            });

        }
    </script>	


    <div id="popupmsjAlerta">
        <div>Aviso</div>
        <div style="overflow: hidden;">
            <div class="row">
                <div class="col-sm-12">

                    <div style='display:inline;' id="mostrarmsjj"></div>

                </div>
            </div>
        </div>
    </div>

    <div id="popupVerDetalleAsiento">
        <div>Detalle del asiento</div>
        <div style="overflow: hidden;" id="form_contenido_asiento_detalle"> 

        </div> 
    </div>

    <div id="popupVerHorarios">
        <div>Seleccionar Horario</div>
        <div style="overflow: hidden;" id="form_contenido"> 
            <?php $this->renderPartial('/persona/_horarios_x_ruta'); ?>
        </div> 
    </div>



    <div id="popupVerBoletos">
        <div>Boletos emitidos</div>
        <div style="overflow: hidden;" id="form_contenido_boletos"> 
            <?php $this->renderPartial('/persona/_listaBoletosEmitidos'); ?>
        </div> 
    </div>

    <?php
}
?>