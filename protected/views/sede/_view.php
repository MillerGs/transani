<?php
/* @var $this SedeController */
/* @var $data Sede */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsede')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(str_pad($data->idsede,7,"0",STR_PAD_LEFT)), array('view', 'id'=>$data->idsede)); ?> 
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sede_desc')); ?>:</b>
	<?php echo CHtml::encode($data->sede_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />


</div>