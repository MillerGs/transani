<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhorario'); ?>
		<?php echo $form->textField($model,'idhorario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idruta'); ?>
		<?php echo $form->textField($model,'idruta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_bus'); ?>
		<?php echo $form->textField($model,'tipo_bus',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_sal'); ?>
		<?php echo $form->textField($model,'hora_sal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_sal'); ?>
		<?php echo $form->textField($model,'fecha_sal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->