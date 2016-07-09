<?php
/* @var $this LocalController */
/* @var $data Local */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLocal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idLocal), array('view', 'id'=>$data->idLocal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idempresa')); ?>:</b>
	<?php echo CHtml::encode($data->idempresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('local_desc')); ?>:</b>
	<?php echo CHtml::encode($data->local_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />


</div>