<?php
/* @var $this ConductorController */
/* @var $data Conductor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idconductor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idconductor), array('view', 'id'=>$data->idconductor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpersona')); ?>:</b>
	<?php echo CHtml::encode($data->idpersona); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idvehiculo')); ?>:</b>
	<?php echo CHtml::encode($data->idvehiculo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_partida')); ?>:</b>
	<?php echo CHtml::encode($data->hora_partida); ?>
	<br />


</div>