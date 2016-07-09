<?php
/* @var $this HorarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Horarios',
);


?>
<?php
$var1 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
    Yii::app()->clientScript->registerScriptFile($var1.'/scripts/jquery-1.11.1.min.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcore.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxbuttons.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscrollbar.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdata.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdate.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscheduler.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscheduler.api.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdatetimeinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxmenu.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcalendar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtooltip.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxwindow.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcheckbox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxlistbox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdropdownlist.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxnumberinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxradiobutton.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/globalization/globalize.js');
       
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.base.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.arctic.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.ui-start.css'); 
?>
<h1>Horarios</h1>
Rutas
<?php echo CHtml::dropDownList("cboRutas",'idruta',CHtml::listData(Ruta::model()->findAll("idoficina="+Usuario::model()->findByPk(Yii::app()->user->id)->idoficina),'idruta','ruta_desc'),
		array('prompt' => '--Seleccione ruta--','onchange'=>'CargarEsquema()')); ?>
<button type="button" id="btnNuevoHorario" onclick = "fn_AgregarHorario()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-new-window"></span> Nuevo Horario</button> 
<?php //echo Usuario::model()->findByPk(Yii::app()->user->id)->idoficina; ?>
<div id="scheduler"></div>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
<script type="text/javascript">
        $(document).ready(function () { 
        	var offset = $("#btnNuevoHorario").offset();
	        $("#popupVerFormHorario").jqxWindow({
	            position: { x: parseInt(offset.left) + 10, y: parseInt(offset.top) + 10 },
	            //theme:"ui-smoothness",
	            width: 250,height:150, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#btnsalircat"), modalOpacity: 0.5         
	        });

        	var url = "<?php echo Yii::app()->createUrl('Horario/ListarHorarioSemana'); ?>";
            var source =
            {
              datatype: "json",
                datafields: [

                    { name: 'id', type: 'string' },
                    { name: 'idhorario', type: 'string' },
                    { name: 'idruta', type: 'string' },
                    { name: 'tipo_bus', type: 'string' },
                    { name: 'hora_sal', type: 'string' },
                    { name: 'fecha_sal', type: 'string' },
                    { name: 'idbus', type: 'string' },
                    { name: 'asientos_libres', type: 'string' },
                    { name: 'asientos_vendidos', type: 'string' },
                    { name: 'precio', type: 'string' },
                    { name: 'color', type: 'string' }, 
                    { name: 'desc_bus',type: 'string'},  
                    { name: 'start', type: 'date', format: "yyyy-MM-dd HH:mm" },
                    { name: 'end', type: 'date', format: "yyyy-MM-dd HH:mm" },
                ],  
                type:'POST',
                id: 'id',
                url: url 
            }; 
            /*
            var appointments = new Array();
            var appointment1 = {
                id: "id1",
                description: "George brings projector for presentations.",
                location: "",
                subject: "Quarterly Project Review Meeting",
                calendar: "Room 1",
                start: new Date(2015, 10, 23, 9, 0, 0),
                end: new Date(2015, 10, 23, 16, 0, 0)
            }*/
             
            // prepare the data
             var objToday = new Date()
            var adapter = new $.jqx.dataAdapter(source); 
            $("#scheduler").jqxScheduler({
                date: new $.jqx.date(objToday.getFullYear(), objToday.getMonth()+1, objToday.getDate()),
                width: 850,
                height: 600,
                source: adapter, 
                view: 1,
                showLegend: true,
                /**
                 * called when the context menu is created.
                 * @param {Object} menu - jqxMenu's jQuery object.
                 * @param {Object} settings - Object with the menu's initialization settings.
                */
                contextMenuCreate: function(menu, settings)
                {
                    var source = settings.source;
                    source.push({ id: "delete", label: "Delete Appointment" });
                    source.push({
                        id: "status", label: "Set Status", items:
                            [
                                { label: "Free", id: "free" },
                                { label: "Out of Office", id: "outOfOffice" },
                                { label: "Tentative", id: "tentative" },
                                { label: "Busy", id: "busy" }
                            ]
                    });
                },
                /**
                 * called when the user clicks an item in the Context Menu. Returning true as a result disables the built-in Click handler.
                 * @param {Object} menu - jqxMenu's jQuery object.
                 * @param {Object} the selected appointment instance or NULL when the menu is opened from cells selection.
                 * @param {jQuery.Event Object} the jqxMenu's itemclick event object.
               */
                contextMenuItemClick: function (menu, appointment, event)
                {
                    var args = event.args;
                    switch (args.id) {
                        case "delete":
                            $("#scheduler").jqxScheduler('deleteAppointment', appointment.id);
                            return true;
                        case "free":
                            $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'free');
                            return true;
                        case "outOfOffice":
                            $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'outOfOffice');
                            return true;
                        case "tentative":
                            $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'tentative');
                            return true;
                        case "busy":
                            $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'busy');
                            return true;
                    }
                },
                /**
                 * called when the menu is opened.
                 * @param {Object} menu - jqxMenu's jQuery object.
                 * @param {Object} the selected appointment instance or NULL when the menu is opened from cells selection.
                 * @param {jQuery.Event Object} the open event.
                */
                contextMenuOpen: function (menu, appointment, event) {
                    if (!appointment) {
                        menu.jqxMenu('hideItem', 'delete');
                        menu.jqxMenu('hideItem', 'status');
                    }
                    else {
                        menu.jqxMenu('showItem', 'delete');
                        menu.jqxMenu('showItem', 'status');
                    }
                },
                /**
                 * called when the menu is closed.
                 * @param {Object} menu - jqxMenu's jQuery object.
                 * @param {Object} the selected appointment instance or NULL when the menu is opened from cells selection.
                  * @param {jQuery.Event Object} the close event.
               */
                contextMenuClose: function (menu, appointment, event) {
                },
                ready: function () {
                    $("#scheduler").jqxScheduler('ensureAppointmentVisible', 'id12');
                }, 
                appointmentDataFields:
                {
                    from: "start",
                    to: "end",
                    id: "id",
                    style: "color",
                    description: "desc_bus",
                    location: "place",
                    subject: "desc_bus",
                    resourceId: "calendar"
                },
                view: 'weekView',
                views:
                [
                    'dayView',
                    'weekView',
                    'monthView'
                ]
            });
        });
function CargarEsquema(){
			var url = "<?php echo Yii::app()->createUrl('Horario/ListarHorarioSemana'); ?>";
            var source =
            {
              datatype: "json",
                datafields: [

                    { name: 'id', type: 'string' },
                    { name: 'idhorario', type: 'string' },
                    { name: 'idruta', type: 'string' },
                    { name: 'tipo_bus', type: 'string' },
                    { name: 'hora_sal', type: 'string' },
                    { name: 'fecha_sal', type: 'string' },
                    { name: 'idbus', type: 'string' },
                    { name: 'asientos_libres', type: 'string' },
                    { name: 'asientos_vendidos', type: 'string' },
                    { name: 'precio', type: 'string' },
                    { name: 'color', type: 'string' },
                    { name: 'desc_bus',type: 'string'}, 
                    { name: 'start', type: 'date', format: "yyyy-MM-dd HH:mm" },
                    { name: 'end', type: 'date', format: "yyyy-MM-dd HH:mm" },
                ],  
                data: {
                  'idruta': $('#cboRutas option:selected').val()
                },
                type:'POST',
                id: 'id',
                url: url 
            }; 
            var objToday = new Date()
            var adapter = new $.jqx.dataAdapter(source); 
            $("#scheduler").jqxScheduler({
                date: new $.jqx.date(objToday.getFullYear(), objToday.getMonth()+1, objToday.getDate()), 
                source: adapter 
              });
}
function fn_AgregarHorario(){
       
        $.ajax({
            url: "<?php echo Yii::app()->createUrl('Horario/create'); ?>",
             
            type: 'post',
            success: function(data){
              
              var offset = $("#btnNuevoHorario").offset();
              $("#form_contenido_hr").html(data);

              $("#popupVerFormHorario").jqxWindow({
                  position: { x: parseInt(offset.left) + 10, y: parseInt(offset.top) + 10 },
                  //theme:"ui-smoothness",
                  width: 250,height:360      
              });
              
              $("#popupVerFormHorario").jqxWindow('open');  
            },
              error: function(xhr){
                  alert("falló "+xhr.readyState+this.url)

              }
          });  
            
  }
  function fn_guardarHorario()
  { 
    //var rowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
    //var data1 = $('#jqxgrid').jqxGrid('getrowdata', rowindex);

    var date = $("#Horario_fecha_sal").jqxDateTimeInput('getDate');
    var formattedDate = $.jqx.dataFormat.formatdate(date, 'yyyy-MM-dd');
     
    $.ajax({
        type: "POST",
        url:    "<?php echo Yii::app()->createUrl('Horario/create'); ?>",
        //data:  {val1:1,val2:2},
        data:  {
              idhorario:'',
              idruta:$("#Horario_idruta option:selected" ).val(),
              precio:$("#Horario_precio" ).val(),
              idbus:$("#Horario_idbus" ).val(),
              hora_sal:$('#Horario_hora_sal').jqxDateTimeInput('getText'),
              fecha_sal:formattedDate
                  },
        beforeSend: function() {   
       
            $("#cargando").css("display", "inline");
          },
        success: function(msg){
          $("#cargando").css("display", "none");
          
          if(msg.substr(1,1)=="1"){
            $("#popupVerFormHorario").jqxWindow('close'); 
            alert(msg.substr(2,msg.length));
            CargarEsquema();
            $("#scheduler").jqxScheduler({
            	ready: function () {
                    $("#scheduler").jqxScheduler('ensureAppointmentVisible', 'id'+msg.substr(2,msg.length-1));
                }, 
            });
            return;
          }
          if(msg.substr(1,1)=="2"){
            alert("Ocurrio un error al guarda");
            return;
          }
          if(msg.substr(1,1)=="3"){
            alert("Los campos no pueden estar vacios");
            return;
          }
          alert(msg);
        },
        error: function(xhr){
          alert("failure"+xhr.readyState+this.url)

        }
      });
  }
    </script>



<div id="popupVerFormHorario">
    <div>Nuevo Horario</div>
    <div style="overflow: hidden;" id="form_contenido_hr">

    </div>
</div>