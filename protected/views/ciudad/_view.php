<?php
/* @var $this CiudadController */
/* @var $data Ciudad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idciudad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(str_pad($data->idciudad,7,"0",STR_PAD_LEFT)), array('view', 'id'=>$data->idciudad)); ?> 
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudaddesc')); ?>:</b>
	<?php echo CHtml::encode($data->ciudaddesc); ?>
	<br />


</div>