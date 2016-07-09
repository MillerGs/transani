    	<table>
    	<div class="row">
    		<div class="col-md-12" >
				<div class="row">
					<input size="32" maxlength="32" name="MantisUserTable[username]" id="idacceso"  value=""  type="hidden">

				</div>
				<div class="row">
		            
		            <div class="col-md-3">
		                <label>Menú</label>
		            </div>
		            <div class="col-md-7">
		            	<?php echo CHtml::dropDownList('menuss','idmenu', CHtml::listData(MenuAccion::model()->findAll(),'idaccion', 'accion_desc'),array('class'=>'form-control input-sm')); ?>
		                <input size="32" maxlength="32" name="MantisUserTable[usernamezx]" id="idaccesoapp" type="hidden">
		            </div>
		        </div>
				
				<div class="row" style="padding-top:5px;">
		            <div class="col-md-3">
		            	<p class="text-info" id="cargando" style="display:none;">
		                    <img align="absmiddle" style="display:inline;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/spinner.gif"/>  Guardando...        
		                </p>
		            </div>
		            <div class="col-md-7">
		                
		                <button type="button" id="guardarcat" onclick = "fn_guardaracceso()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Agregar</button>
		            
		                <button type="button" id="btnsalircat" onclick="fn_Salir11()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Salir</button>
		            </div>
		            
		        </div>
			</div>
		</div>
		</table>
<script>
	function fn_Salir11(){
		$("#popupVerNoticiaDetalles").jqxWindow('close');  
	}
</script>
