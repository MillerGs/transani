<?php
/* @var $this BusController */
/* @var $model Bus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idchofer'); ?> 
		<?php echo $form->dropDownList($model,'idchofer',CHtml::listData(Persona::model()->findAll(array('order' => 'nombres ASC')),'idpersona','nombres')); ?>
						
		<?php echo $form->error($model,'idchofer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placa'); ?>
		<?php echo $form->textField($model,'placa',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'placa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcopiloto'); ?> 
		<?php echo $form->dropDownList($model,'idcopiloto',CHtml::listData(Persona::model()->findAll(array('order' => 'nombres ASC')),'idpersona','nombres')); ?>
						<?php echo $form->error($model,'idcopiloto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nros_asientos'); ?>
		<?php echo $form->textField($model,'nros_asientos'); ?>
		<?php echo $form->error($model,'nros_asientos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_bus'); ?> 
		<?php echo $form->dropDownList($model,'tipo_bus',array('PLATINO'=>'PLATINO','BUS-CAMA'=>'BUS-CAMA','SIMPLE'=>'SIMPLE')); ?>
		<?php echo $form->error($model,'tipo_bus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->