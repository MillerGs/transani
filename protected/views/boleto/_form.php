<?php
/* @var $this BoletoController */
/* @var $model Boleto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'boleto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_boleto'); ?>
		<?php echo $form->textField($model,'nro_boleto',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nro_boleto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idciudad_origen'); ?>
		<?php echo $form->textField($model,'idciudad_origen'); ?>
		<?php echo $form->error($model,'idciudad_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idciudad_destino'); ?>
		<?php echo $form->textField($model,'idciudad_destino'); ?>
		<?php echo $form->error($model,'idciudad_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiento'); ?>
		<?php echo $form->textField($model,'asiento'); ?>
		<?php echo $form->error($model,'asiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_viaje'); ?>
		<?php echo $form->textField($model,'fecha_viaje'); ?>
		<?php echo $form->error($model,'fecha_viaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hora_partida'); ?>
		<?php echo $form->textField($model,'hora_partida',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'hora_partida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_boleto'); ?>
		<?php echo $form->textField($model,'tipo_boleto',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipo_boleto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pagado'); ?>
		<?php echo $form->textField($model,'pagado'); ?>
		<?php echo $form->error($model,'pagado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpersona_emisor'); ?>
		<?php echo $form->textField($model,'idpersona_emisor'); ?>
		<?php echo $form->error($model,'idpersona_emisor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpersona_receptor'); ?>
		<?php echo $form->textField($model,'idpersona_receptor'); ?>
		<?php echo $form->error($model,'idpersona_receptor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->