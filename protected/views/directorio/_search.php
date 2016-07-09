<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'iddirectorio'); ?>
		<?php echo $form->textField($model,'iddirectorio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idtipo_telefono'); ?>
		<?php echo $form->textField($model,'idtipo_telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel_numero'); ?>
		<?php echo $form->textField($model,'tel_numero',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'directoriocol'); ?>
		<?php echo $form->textField($model,'directoriocol',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idLocal'); ?>
		<?php echo $form->textField($model,'idLocal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->