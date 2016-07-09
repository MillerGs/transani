<?php
/* @var $this MenuAccionController */
/* @var $data MenuAccion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idaccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idaccion), array('view', 'id'=>$data->idaccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmenu')); ?>:</b>
	<?php echo CHtml::encode($data->idmenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accion_desc')); ?>:</b>
	<?php echo CHtml::encode($data->accion_desc); ?>
	<br />


</div>