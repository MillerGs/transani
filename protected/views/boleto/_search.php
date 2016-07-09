<?php
/* @var $this BoletoController */
/* @var $model Boleto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idboleto'); ?>
		<?php echo $form->textField($model,'idboleto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_boleto'); ?>
		<?php echo $form->textField($model,'nro_boleto',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idciudad_origen'); ?>
		<?php echo $form->textField($model,'idciudad_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idciudad_destino'); ?>
		<?php echo $form->textField($model,'idciudad_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asiento'); ?>
		<?php echo $form->textField($model,'asiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_viaje'); ?>
		<?php echo $form->textField($model,'fecha_viaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_partida'); ?>
		<?php echo $form->textField($model,'hora_partida',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_boleto'); ?>
		<?php echo $form->textField($model,'tipo_boleto',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagado'); ?>
		<?php echo $form->textField($model,'pagado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion'); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpersona_emisor'); ?>
		<?php echo $form->textField($model,'idpersona_emisor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpersona_receptor'); ?>
		<?php echo $form->textField($model,'idpersona_receptor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->