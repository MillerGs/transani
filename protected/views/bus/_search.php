<?php
/* @var $this BusController */
/* @var $model Bus */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbus'); ?>
		<?php echo $form->textField($model,'idbus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idchofer'); ?>
		<?php echo $form->textField($model,'idchofer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'placa'); ?>
		<?php echo $form->textField($model,'placa',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcopiloto'); ?>
		<?php echo $form->textField($model,'idcopiloto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nros_asientos'); ?>
		<?php echo $form->textField($model,'nros_asientos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_bus'); ?>
		<?php echo $form->textField($model,'tipo_bus',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->