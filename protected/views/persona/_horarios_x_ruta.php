<?php
$var1 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
    Yii::app()->clientScript->registerScriptFile($var1.'/scripts/jquery-1.11.1.min.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcore.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdata.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtabs.js'); 
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcheckbox.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdatetimeinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcalendar.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxbuttons.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscrollbar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxpanel.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxmenu.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdatetimeinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/globalization/globalize.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcalendar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxlistbox.js'); 
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdatatable.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxnavigationbar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.selection.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.filter.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.sort.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtree.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxwindow.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxlistbox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.pager.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.columnsresize.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxexpander.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcheckbox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxbuttons.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.edit.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdropdownlist.js');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.base.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.arctic.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.ui-start.css'); 
?>

          <table>
            <tr>
              <td> 
                <div class="col-md-10">  
                  Horarios disponibles   
                    <div class="input-append">
                      <button type="button" id="btnNuevoHorario" onclick = "fn_AgregarHorario()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-new-window"></span> Nuevo</button>  
                    <button type="button" id="btnEditarPlanilla" onclick = "fn_EditarPlanilla()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</button>  
                    <button type="button" id="btnEliminarPlanilla" onclick = "fn_EliminarPlanilla()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar</button> 
                      <button type="button" id="btnBusquedaSeleccionarTrabajador" class="btn">Buscar</button>
                    </div>  
                  </div> 
                  <div class="col-md-2">
                    <div class="input-append">
                    <div id='fecha_hora'> </div>  
                  </div>
                  </div>
              </td>
            </tr>
            <tr>
              <td> 
                <div id="jqxgridseleccionarTrabajador"  style="margin-top:10px;"></div>
                <div class="col-md-12">

                  <button type="button"  onclick = "fn_btn_seleccionarHorario()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Seleccionar</button>
              
                  <button type="button" id="btnsalircat" onclick="fn_Salir12()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Cancelar</button>
                </div>
              </td>
            </tr>
          </table>


<script type="text/javascript">
  $(document).ready(function(){
      iniciarGrillaseleccionPersonal();
      CargarGrillaseleccionPersonal();
      $("#fecha_hora").jqxDateTimeInput({width: '100px', height: '19px',formatString:'dd/MM/yyyy'});
      var offset = $("#btnNuevoHorario").offset();
        $("#popupVerFormHorario").jqxWindow({
            position: { x: parseInt(offset.left) + 10, y: parseInt(offset.top) + 10 },
            //theme:"ui-smoothness",
            width: 250,height:150, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#btnsalircat"), modalOpacity: 0.5         
        });

      $( "#textoBusquedaSeleccionarTrabajador" ).keypress(function( event ) {
        if ( event.which == 13 ) { 
          $("#jqxgridseleccionarTrabajador").jqxGrid('clearselection'); 
           CargarGrillaseleccionPersonal();
        } 
      });
          $("#btnBusquedaSeleccionarTrabajador").click( function()
            { 
              $("#jqxgridseleccionarTrabajador").jqxGrid('clearselection'); 
              CargarGrillaseleccionPersonal();
            }
          );
  });
  function iniciarGrillaseleccionPersonal(){ 
      var source =
            {
              datatype: "json",
                datafields: [
                    {name:'idhorario',type: 'string' },
                    {name:'idruta',type: 'string' },
                    {name:'tipo_bus',type: 'string'},
                    {name:'hora_sal',type: 'string'},
                    {name:'fecha_sal',type: 'string'},
                    {name:'idbus',type: 'string'},
                    {name:'asientos_libres',type: 'string'},
                    {name:'asientos_vendidos',type: 'string'},
                    {name:'precio',type: 'string'},
                    {name:'idchofer',type: 'string'}, 
                    {name:'piloto',type: 'string'},
                    {name:'idcopiloto',type: 'string'},
                    {name:'copiloto',type: 'string'},
                    {name:'placa',type: 'string'},
                    {name:'nros_asientos',type: 'string'},
                    {name:'tipo_bus',type: 'string'},    
                ],  
                type:'POST',
                id: 'idhorario', 
                root: 'data'
            }; 
            var renderer = function (row, column, value) {
                return '<span style="margin-left: 4px; margin-top: 4px; float: left;">' + value + '</span>';
            }
            // creage jqxgrid
            $("#jqxgridseleccionarTrabajador").jqxGrid(
            {
                width: '99%',
                height: 440,
                theme: "ui-start",
                source: source, 
                pageable: false,
                columnsresize: true, 
                columns: [ 
                      { text: 'idhorario', datafield: 'idhorario',editable: false,hidden:true, width: '20%', cellsrenderer: renderer },
                      { text: 'idruta', datafield: 'idruta',editable: false,hidden:true, width: '20%', cellsrenderer: renderer },
                      { text: 'Tipo', datafield: 'tipo_bus',hidden:false, width: '40%',editable: false, cellsrenderer: renderer },  
                      { text: 'Hora Salida', datafield: 'hora_sal',hidden:false, width: '30%',editable: false, cellsrenderer: renderer }, 
                      { text: 'Fecha Salida', datafield: 'fecha_sal',hidden:false, width: '30%',editable: false, cellsrenderer: renderer }, 
                  ]
            });
  }
  function convertFecha(jdate)
  {
       var date = new Date(jdate),
       mnth = ("0" + (date.getMonth()+1)).slice(-2),
       day  = ("0" + date.getDate()).slice(-2);
       return [ date.getFullYear(), mnth, day ].join("-");
  }
  function CargarGrillaseleccionPersonal(){
   
    var url = "<?php echo Yii::app()->createUrl('Persona/ListarHorariosXruta'); ?>";
            var source =
            {
              datatype: "json",
                datafields: [
                    {name:'idhorario',type: 'string' },
                    {name:'idruta',type: 'string' },
                    {name:'tipo_bus',type: 'string'},
                    {name:'hora_sal',type: 'string'},
                    {name:'fecha_sal',type: 'string'},
                    {name:'idbus',type: 'string'},
                    {name:'asientos_libres',type: 'string'},
                    {name:'asientos_vendidos',type: 'string'},
                    {name:'precio',type: 'string'},
                    {name:'idchofer',type: 'string'},
                    {name:'piloto',type: 'string'},
                    {name:'idcopiloto',type: 'string'},
                    {name:'copiloto',type: 'string'},
                    {name:'placa',type: 'string'},
                    {name:'nros_asientos',type: 'string'},
                    {name:'tipo_bus',type: 'string'},   
                ], 
                data: {
                              'idruta': $('#cboRutas option:selected').val(), 
                              'fecha': convertFecha($("#fecha_hora").jqxDateTimeInput('getDate'))
                          },
                type:'POST',
                id: 'idhorario',
                url: url,
                root: 'data'
            }; 
             
            $("#jqxgridseleccionarTrabajador").jqxGrid(
            { 
                source: source,  
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
          
          if(msg=="1"){
            $("#popupVerFormHorario").jqxWindow('close'); 
            CargarGrillaseleccionPersonal();
            return;
          }
          if(msg=="2"){
            alert("Ocurrio un error al guarda");
            return;
          }
          if(msg=="3"){
            alert("Los campos no pueden estar vacios");
            return;
          }
          //alert(msg);
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