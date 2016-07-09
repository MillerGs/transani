
<?php
$var1 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
    Yii::app()->clientScript->registerScriptFile($var1.'/scripts/jquery-1.11.1.min.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcore.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdata.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxbuttons.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscrollbar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxpanel.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxmenu.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxlistbox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxgrid.js');
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
<?php
/* @var $this RolController */
/* @var $model Rol */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->idrol,
);

$this->menu=array(
	array('label'=>'Listar Rol', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Editar Rol', 'url'=>array('update', 'id'=>$model->idrol)),
	array('label'=>'Eliminar Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrol),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Rol', 'url'=>array('admin')),
);
?>

<h1>Ver Rol #<?php echo $model->idrol; ?></h1>
<div class="row">
	
	<div class="col-md-6">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'idrol',
				'desc',
			),
		)); ?>
	</div>
	<div class="col-md-6">
		<a href="#" onclick="fn_addCategoria()"><img height="20" src="<?php echo Yii::app()->request->baseUrl;?>/images/ico_add.png"></a>
    	<a href="#" onclick="fn_eliminarCategoria()"><img height="20" src="<?php echo Yii::app()->request->baseUrl;?>/images/ico_eliminar.png"></a>
	   
		<div id="jqxgrid"></div>
	</div>
</div>

<div id="popupVerNoticiaDetalles">
    <div>Buscar Menú</div>
    <div style="overflow: hidden;" id="det_cat_proj">

    </div>
</div>



<div id="popupmsjAlerta">
    <div>Aviso</div>
    <div style="overflow: hidden;">
      <div class="row">
          <div class="col-sm-12">
            <img  src='<?php echo Yii::app()->request->baseUrl."/images/ico_Error.gif"; ?>' />
              <div style='display:inline;' id="mostrarmsjj"></div>
          </div>
      </div>
    </div>
</div>


<div id="popupmsjEliminar">
    <div>Eliminar</div>
    <div style="overflow: hidden;">
      <div class="row">
          <div class="col-sm-12">
            <img  src='<?php echo Yii::app()->request->baseUrl."/images/ico_Error.gif"; ?>' />
              <div style='display:inline;'></div>Esta seguro de eliminar el siguiente item?
          </div>
        </div>
        <div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <button type="button" id="guardarcatas" onclick = "fn_eliminarcatdef()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Eliminar</button>
              <button type="button" id="btnsalir3"  class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Salir</button>
            </div>
        </div>
      </div>
    </div>
</div>


<script type="text/javascript">
        $(document).ready(function () {
        	var offset = $("#jqxgrid").offset();
          $("#popupVerNoticiaDetalles").jqxWindow({
              position: { x: parseInt(offset.left) + 10, y: parseInt(offset.top) + 10 },
              //theme:"ui-smoothness",
              width: 300,height:150, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#btnsalircat"), modalOpacity: 0.5         
          });

          $("#popupmsjAlerta").jqxWindow({
              position: { x: parseInt(offset.left) + 10, y: parseInt(offset.top) + 10 },
              //theme:"ui-smoothness",
              width: 300,height:100, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#btnsalircat"), modalOpacity: 0.5         
          });

          $("#popupmsjEliminar").jqxWindow({
              position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 10 },
              //theme:"ui-smoothness",
              width: 300,height:110, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#btnsalir3"), modalOpacity: 0.5         
          });

        	CargarGrilla();
        });
function CargarGrilla(){
		var url = "<?php echo Yii::app()->createUrl('Rol/vercategorias'); ?>";
            var source =
            {
            	datatype: "json",
                datafields: [
                    {name:'id',type: 'string' },
                    {name:'id_rol',type: 'string' },
                    {name:'idmenu',type: 'string' },
                    {name:'accion',type: 'string' },
                    {name:'controlador',type: 'string' }
                ],
                data: {
	                            'id': <?php echo $model->idrol;?>
	                        },
                type:'POST',
                id: 'id',
                url: url,
                root: 'data'
            };
            var employeesAdapter = new $.jqx.dataAdapter(source);
            
            // create nested grid.
            
            var renderer = function (row, column, value) {
                return '<span style="margin-left: 4px; margin-top: 4px; float: left;">' + value + '</span>';
            }
            // creage jqxgrid
            $("#jqxgrid").jqxGrid(
            {
                width: '100%',
                height: 200,
                theme: "ui-start",
                source: source,
               
                pageable: true,
                columnsresize: true,
                
                columns: [
                      { text: 'Id', datafield: 'id',editable: false,hidden:true, width: '10%', cellsrenderer: renderer },
                      { text: 'id_rol', datafield: 'id_rol',hidden:true, width: '10%',editable: false, cellsrenderer: renderer },
                      { text: 'idmenu', datafield: 'idmenu',editable: false,hidden:true, width: '55%', cellsrenderer: renderer },
                      
                      { text: 'Controlador', datafield: 'controlador', width: '50%',editable: false, cellsrenderer: renderer },
                      { text: 'Acción', datafield: 'accion', width: '50%',editable: false, cellsrenderer: renderer }
                  ]
            });
            

}	

function fn_addCategoria()
{
    $.ajax({
        url: "<?php echo Yii::app()->createUrl('Rol/addacceso'); ?>",
        data:  {
                      idrol:'<?php echo $model->idrol;?>'
                  },
        type: 'post',
        success: function(data){
          
          $("#det_cat_proj").html(data);

          $("#popupVerNoticiaDetalles").jqxWindow({
              //theme:"ui-smoothness",
              width: 280,height:110      
          });
          
          $("#popupVerNoticiaDetalles").jqxWindow('open');  
        },
          error: function(xhr){
              alert("falló "+xhr.readyState+this.url)

          }
      });
}
function fn_editarCategoria()
{
  var rowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
  var data1 = $('#jqxgrid').jqxGrid('getrowdata', rowindex);
  if(rowindex!=-1){
      $.ajax({
        url: "<?php echo Yii::app()->createUrl('MantisProjectTable/addCategoria'); ?>",
        
        type: 'post',
        success: function(data){
          
          $("#det_cat_proj").html(data);
          
          $("#usuarioss").val( data1.user_id ).prop('selected',true);
          $("#cat_nombre").val(data1.name);
          $("#idcategoriapp").val(data1.id);
          if(data1.status=="1")
            $("#cat_estado").prop('checked', true);
          else
            $("#cat_estado").prop('checked', false);

          $("#popupVerNoticiaDetalles").jqxWindow('open');  
        },
          error: function(xhr){
              alert("falló "+xhr.readyState+this.url)

          }
      });
  }else{
      $("#mostrarmsjj").html("Seleccione una fila para editar");
      
      $("#popupmsjAlerta").jqxWindow('open'); 
  }
  //alert(data1.cat_nombre);
  
}
function fn_eliminarCategoria()
{
  var rowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
  var data1 = $('#jqxgrid').jqxGrid('getrowdata', rowindex);
  if(rowindex!=-1){
    $("#popupmsjEliminar").jqxWindow('open'); 
  }else{
      $("#mostrarmsjj").html("Seleccione una fila para eliminar");
      
      $("#popupmsjAlerta").jqxWindow('open'); 
  }
  
}
function fn_guardaracceso()
  {
    $.ajax({
        type: "POST",
        url:    "<?php echo Yii::app()->createUrl('Rol/guardarAcceso'); ?>",
        //data:  {val1:1,val2:2},
        data:  {
                      idrol:'<?php echo $model->idrol;?>',
                      idmenu:$("#Menus_idmenu option:selected").val(),
                      id:$("#idaccesoapp").val()
                  },
        beforeSend: function() {   
       
            $("#cargando").css("display", "inline");
          },
        success: function(msg){
          $("#cargando").css("display", "none");
          
          if(msg=="1"){
            if($("#idaccesoapp").val()!=""){
              $("#popupVerNoticiaDetalles").jqxWindow('close'); 
            }
            fn_refreshgrillaCategorias();
          }
          if(msg=="2"){
            alert("Ocurrio un error al guarda");
          }
          if(msg=="3"){
            alert("Los campos no pueden estar vacios");
          }
        },
        error: function(xhr){
          alert("failure"+xhr.readyState+this.url)

        }
      });
  }
  function fn_refreshgrillaCategorias(){
            var url = "<?php echo Yii::app()->createUrl('Rol/vercategorias'); ?>";
            var source =
            {
              datatype: "json",
                datafields: [
                    {name:'id',type: 'string' },
                    {name:'id_rol',type: 'string' },
                    {name:'idmenu',type: 'string' },
                    {name:'accion',type: 'string' },
                    {name:'controlador',type: 'string' }
                ],
                data: {
                              'id': <?php echo $model->idrol;?>
                          },
                type:'POST',
                id: 'id',
                url: url,
                root: 'data'
            };
            $("#jqxgrid").jqxGrid(
            {
                source: source
            });
  }
  function fn_eliminarcatdef(){
    var rowindex = $('#jqxgrid').jqxGrid('getselectedrowindex');
  var data1 = $('#jqxgrid').jqxGrid('getrowdata', rowindex);

      $.ajax({
        type: "POST",
        url:  "<?php echo Yii::app()->createUrl('Rol/eliminarAcceso'); ?>" ,
        //data:  {val1:1,val2:2},
        data:  {
                      id:data1.id
                  },
        beforeSend: function() {   
            $("#cargando").css("display", "inline");
          },
        success: function(msg){
          $("#cargando").css("display", "none");
          if(msg=="1"){
            $("#popupmsjEliminar").jqxWindow('close'); 
            fn_refreshgrillaCategorias();
          }else{
              alert("no se pudo eliminar");
          }
          
        },
        error: function(xhr){
          alert("failure"+xhr.readyState+this.url)

        }
      });
  }
</script>
