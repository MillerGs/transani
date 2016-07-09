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
                  Boletos emitidos del día   
                    <div class="input-append">
                      <button type="button" id="btnCargarGrillaboletos" onclick = "fn_Imprimir_boleto()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-new-window"></span> Cargar grilla</button>   
                    </div>  
                  </div>   
              </td>
            </tr>
            <tr>
              <td> 
                <div id="jqxgridBoletos"  style="margin-top:10px;"></div>
                <div class="col-md-12">
  
                  <button type="button" id="btnsalircat" onclick="fn_Salir12()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Salir</button>
                </div>
              </td>
            </tr>
          </table>


<script type="text/javascript">
  $(document).ready(function(){
      iniciarGrillaBoletos();
      CargarGrillaBoletos();
 
 
          $("#btnCargarGrillaboletos").click( function()
            { 
              $("#jqxgridBoletos").jqxGrid('clearselection'); 
              CargarGrillaBoletos();
            }
          );
  });
  function iniciarGrillaBoletos(){ 
      var source =
            {
              datatype: "json",
                datafields: [
                    {name:'idboleto',type: 'string' },
                    {name:'serie',type: 'string' },
                    {name:'numero',type: 'string'},
                    {name:'serie_numero',type: 'string'},
                    {name:'tipo_doc',type: 'string'},
                    {name:'ruc',type: 'string'},
                    {name:'razon_social',type: 'string'},
                    {name:'idcliente',type: 'string'},
                    {name:'nombres',type: 'string'},
                    {name:'nrodoc',type: 'string'},
                    {name:'origend',type: 'string'},
                    {name:'destinod',type: 'string'},
                    {name:'nroasiento',type: 'string'}, 
                    {name:'fechaviaje',type: 'string'},
                    {name:'horaviaje',type: 'string'},
                    {name:'precio',type: 'string'},
                    {name:'estado',type: 'string'},
                    {name:'idbus',type: 'string'},   
                    {name:'placabus',type: 'string'}, 
                ],  
                type:'POST',
                id: 'idboleto', 
                root: 'data'
            }; 
            var renderer = function (row, column, value) {
                return '<span style="margin-left: 4px; margin-top: 4px; float: left;">' + value + '</span>';
            }
            // creage jqxgrid
            var celdarenderer_clave= function (row, column, value) {
                return '<div style="text-align: center; margin-top: 5px;"><img align="absmiddle" style="display:inline;height:20px" src="<?php echo Yii::app()->request->baseUrl;?>/images/icono_llave.png"/><a style="cursor:pointer;text-decoration: underline;color:blue;" onclick="fn_imprimir_boleto('+value+')"> '+value+'</a></div>';
            }
            $("#jqxgridBoletos").jqxGrid(
            {
                width: '99%',
                height: 440,
                theme: "ui-start",
                source: source, 
                pageable: false,
                columnsresize: true, 
                columns: [  
                      { text: 'Cod', datafield: 'idboleto',editable: false,hidden:false, width: '10%', cellsrenderer: celdarenderer_clave }, 
                      { text: 'Nro', datafield: 'serie_numero',editable: false,hidden:false , width: '15%', cellsrenderer: renderer },  
                      { text: 'Nro doc.', datafield: 'nrodoc',hidden:false, width: '10%',editable: false, cellsrenderer: renderer },  
                      { text: 'Cliente', datafield: 'nombres',hidden:false, width: '30%',editable: false, cellsrenderer: renderer }, 
                      { text: 'Destino', datafield: 'origend',hidden:false, width: '15%',editable: false, cellsrenderer: renderer },  
                      { text: 'Origen', datafield: 'destinod',hidden:false, width: '15%',editable: false, cellsrenderer: renderer },  
                      { text: 'Fecha Viaje', datafield: 'fechaviaje',hidden:false, width: '10%',editable: false, cellsrenderer: renderer }, 
                      { text: 'Hora Viaje', datafield: 'horaviaje',hidden:false, width: '10%',editable: false, cellsrenderer: renderer }, 
                      { text: 'Precio', datafield: 'precio',hidden:false, width: '10%',editable: false, cellsrenderer: renderer },  
                      { text: 'Bus', datafield: 'placabus',hidden:false, width: '10%',editable: false, cellsrenderer: renderer }, 
                  ]
            });
  }
  function CargarGrillaBoletos(){
    var url = "<?php echo Yii::app()->createUrl('Persona/ListarJsonBoletos'); ?>";
            var source =
            {
              datatype: "json",
                datafields: [
                    {name:'idboleto',type: 'string' },
                    {name:'serie',type: 'string' },
                    {name:'numero',type: 'string'},
                    {name:'serie_numero',type: 'string'},
                    {name:'tipo_doc',type: 'string'},
                    {name:'ruc',type: 'string'},
                    {name:'razon_social',type: 'string'},
                    {name:'idcliente',type: 'string'},
                    {name:'nombres',type: 'string'},
                    {name:'nrodoc',type: 'string'},
                    {name:'origend',type: 'string'},
                    {name:'destinod',type: 'string'},
                    {name:'nroasiento',type: 'string'}, 
                    {name:'fechaviaje',type: 'string'},
                    {name:'horaviaje',type: 'string'},
                    {name:'precio',type: 'string'},
                    {name:'estado',type: 'string'},
                    {name:'idbus',type: 'string'},   
                    {name:'placabus',type: 'string'},   
                ],  
                type:'POST',
                id: 'idboleto',
                url: url,
                root: 'data'
            }; 
             
            $("#jqxgridBoletos").jqxGrid(
            { 
                source: source,  
            });
            
            
} 
function fn_imprimir_boleto(idboleto)
  {
        var rowindex = $('#jqxgridBoletos').jqxGrid('getselectedrowindex');  
      if(rowindex!=-1){
          
            var data = $('#jqxgridBoletos').jqxGrid('getrowdata', rowindex); 
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("target", "formresult");
            form.action = "<?php echo Yii::app()->request->baseUrl;?>/index.php/Boleto/Rpte_ver_boleto";
            var hiddenField = document.createElement("input"); 
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "idpers");
            hiddenField.setAttribute("value", data.idboleto);
            form.appendChild(hiddenField);
            document.body.appendChild(form);

            var w = 700;
            var h = 400;
            var left = (screen.width/2)-(w/2);
            var top = (screen.height/2)-(h/2);
            javascript:window.open("","formresult","width="+w+",height="+h+",top="+top+",left="+left); 
            form.submit();
      }else{ 
            alert("Seleccione una fila");
      } 
} 
</script>



 