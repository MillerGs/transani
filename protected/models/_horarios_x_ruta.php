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
                <div class="col-md-12">  
                  Horarios disponibles   
                    <div class="input-append">
                      <input type="text" name="textoBusqueda" id="textoBusquedaSeleccionarTrabajador" class="span2 search-query">
                      <button type="button" id="btnBusquedaSeleccionarTrabajador" class="btn">Buscar</button>
                    </div>  
                  </div>   
              </td>
            </tr>
            <tr>
              <td> 
                <div id="jqxgridseleccionarTrabajador"  style="margin-top:10px;"></div>
                <div class="col-md-12">
                  <button type="button"  onclick = "fn_btn_seleccionarTrabajador()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Seleccionar</button>
              
                  <button type="button" id="btnsalircat" onclick="fn_Salir12()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Cancelar</button>
                </div>
              </td>
            </tr>
          </table>


<script type="text/javascript">
  $(document).ready(function(){
      iniciarGrillaseleccionPersonal();
      CargarGrillaseleccionPersonal();
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
                    {name:'fecha_sal',type: 'string'}    
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
                      { text: 'idhorario', datafield: 'idhorario',editable: false,hidden:false, width: '20%', cellsrenderer: renderer },
                      { text: 'idruta', datafield: 'idruta',editable: false,hidden:false, width: '20%', cellsrenderer: renderer },
                      { text: 'Tipo', datafield: 'tipo_bus',hidden:false, width: '80%',editable: false, cellsrenderer: renderer },  
                      { text: 'Hora Salida', datafield: 'hora_sal',hidden:false, width: '80%',editable: false, cellsrenderer: renderer }, 
                      { text: 'Fecha Salida', datafield: 'fecha_sal',hidden:false, width: '80%',editable: false, cellsrenderer: renderer }, 
                  ]
            });
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
                    {name:'fecha_sal',type: 'string' }   
                ], 
                data: {
                              'idruta': $('#cboRutas option:selected').val()
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
</script>