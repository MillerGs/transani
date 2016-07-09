<?php
/* @var $this TipoTelefonoController */
/* @var $data tipoTelefono */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipo_telefono')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtipo_telefono), array('view', 'id'=>$data->idtipo_telefono)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />


</div>