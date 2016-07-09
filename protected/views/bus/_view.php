<?php
/* @var $this BusController */
/* @var $data Bus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbus')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(str_pad($data->idbus,7,"0",STR_PAD_LEFT)), array('view', 'id'=>$data->idbus)); ?>
	 
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idchofer')); ?>:</b>
	<?php echo CHtml::encode($data->idchofer0->nombres.' '.$data->idchofer0->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('placa')); ?>:</b>
	<?php echo CHtml::encode($data->placa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcopiloto')); ?>:</b>
	<?php echo CHtml::encode($data->idcopiloto0->nombres.' '.$data->idcopiloto0->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nros_asientos')); ?>:</b>
	<?php echo CHtml::encode($data->nros_asientos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_bus')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_bus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />


</div>