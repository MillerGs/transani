<?php
$var1 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ')); 
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcore.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdatetimeinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcalendar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxwindow.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdatetimeinput.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtooltip.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/globalization/globalize.js');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.base.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.arctic.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.ui-start.css');
 
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pershorario-detalle-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
 		<?php echo $form->hiddenField($model,'idhorario'); ?> 
		<?php echo $form->hiddenField($model,'idhorario'); ?>  


	<div class="row">
		<?php echo $form->labelEx($model,'idruta'); ?>
		<?php echo $form->dropDownList($model,'idruta',CHtml::listData(Ruta::model()->findAll("idoficina="+Usuario::model()->findByPk(Yii::app()->user->id)->idoficina),'idruta','ruta_desc') ); ?> 
		<?php echo $form->error($model,'idruta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idbus'); ?>
		<?php echo $form->dropDownList($model,'idbus',CHtml::listData(Bus::model()->findAll(),'idbus','placa') ); ?> 
		<?php echo $form->error($model,'idbus'); ?>
	</div>
 
	<div class="row">     
		<?php echo $form->labelEx($model,'fecha_sal'); ?>
    	<div id='Horario_fecha_sal'> </div>
		<?php echo $form->error($model,'fecha_sal'); ?>
  	</div>  
	<div class="row">
		<?php echo $form->labelEx($model,'hora_sal'); ?>
		<div id='Horario_hora_sal'style="display: inline-block;margin-bottom:-5px;">
		<?php echo $form->error($model,'hora_sal'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<input size="15" maxlength="50" type="text" value=""id="Horario_precio">
		<?php echo $form->error($model,'precio'); ?>
	</div>
 
 	<br>
	<div class="row" style="padding-top:5px;">
        <div class="col-md-3">
        	<p class="text-info" id="cargando" style="display:none;">
                <img align="absmiddle" style="display:inline;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/spinner.gif"/>  Guardando...        
            </p>
        </div>
    </div>	

	<div class="row">
        <div class="col-md-12">
		<?php  
			if($model->isNewRecord){
				echo '<button type="button" onclick = "fn_guardarHorario()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Agregar</button>';
			}else{
				echo '<button type="button" onclick = "fn_guardar_edicionDetalle()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</button>';
			}
		?>
		<button type="button" id="btnsalircat" onclick="fn_Salir13()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-off"></span> Salir</button>
		</div>
        
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$(document).ready(function () {
		$("#Horario_hora_sal").jqxDateTimeInput({formatString: "HH:mm:ss",width: '90px',  showCalendarButton: false, height: '19px'}); 
		$("#Horario_fecha_sal").jqxDateTimeInput({width: '100px', height: '19px'});
	});
	function fn_Salir13(){
		$("#popupVerFormHorario").jqxWindow('close');  
	} 
</script>
