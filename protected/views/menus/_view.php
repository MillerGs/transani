<?php
/* @var $this MenusController */
/* @var $data Menus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmenu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmenu), array('view', 'id'=>$data->idmenu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_desc')); ?>:</b>
	<?php echo CHtml::encode($data->menu_desc); ?>
	<br />


</div>

	