<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'directorio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idtipo_telefono'); ?>
		<?php echo $form->textField($model,'idtipo_telefono'); ?>
		<?php echo $form->error($model,'idtipo_telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_numero'); ?>
		<?php echo $form->textField($model,'tel_numero',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tel_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'directoriocol'); ?>
		<?php echo $form->textField($model,'directoriocol',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'directoriocol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idLocal'); ?>
		<?php echo $form->textField($model,'idLocal'); ?>
		<?php echo $form->error($model,'idLocal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->