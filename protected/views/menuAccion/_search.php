<?php
/* @var $this MenuAccionController */
/* @var $model MenuAccion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idaccion'); ?>
		<?php echo $form->textField($model,'idaccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idmenu'); ?>
		<?php echo $form->textField($model,'idmenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accion_desc'); ?>
		<?php echo $form->textField($model,'accion_desc',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->