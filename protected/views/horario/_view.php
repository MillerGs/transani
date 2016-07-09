<?php
/* @var $this HorarioController */
/* @var $data Horario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhorario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhorario), array('view', 'id'=>$data->idhorario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idruta')); ?>:</b>
	<?php echo CHtml::encode($data->idruta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_bus')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_bus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_sal')); ?>:</b>
	<?php echo CHtml::encode($data->hora_sal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_sal')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_sal); ?>
	<br />


</div>