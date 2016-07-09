<?php
/* @var $this MenuAccionController */
/* @var $model MenuAccion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-accion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idmenu'); ?>
		<?php echo $form->textField($model,'idmenu'); ?>
		<?php echo $form->error($model,'idmenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accion_desc'); ?>
		<?php echo $form->textField($model,'accion_desc',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'accion_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->