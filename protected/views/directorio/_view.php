<?php
/* @var $this DirectorioController */
/* @var $data Directorio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iddirectorio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iddirectorio), array('view', 'id'=>$data->iddirectorio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipo_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->idtipo_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_numero')); ?>:</b>
	<?php echo CHtml::encode($data->tel_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('directoriocol')); ?>:</b>
	<?php echo CHtml::encode($data->directoriocol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLocal')); ?>:</b>
	<?php echo CHtml::encode($data->idLocal); ?>
	<br />


</div>