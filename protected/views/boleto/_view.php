<?php
/* @var $this BoletoController */
/* @var $data Boleto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idboleto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idboleto), array('view', 'id'=>$data->idboleto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_boleto')); ?>:</b>
	<?php echo CHtml::encode($data->nro_boleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idciudad_origen')); ?>:</b>
	<?php echo CHtml::encode($data->idciudad_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idciudad_destino')); ?>:</b>
	<?php echo CHtml::encode($data->idciudad_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asiento')); ?>:</b>
	<?php echo CHtml::encode($data->asiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_viaje')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_viaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_partida')); ?>:</b>
	<?php echo CHtml::encode($data->hora_partida); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_boleto')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_boleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagado')); ?>:</b>
	<?php echo CHtml::encode($data->pagado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpersona_emisor')); ?>:</b>
	<?php echo CHtml::encode($data->idpersona_emisor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpersona_receptor')); ?>:</b>
	<?php echo CHtml::encode($data->idpersona_receptor); ?>
	<br />

	*/ ?>

</div>