<?php
/* @var $this TipoTelefonoController */
/* @var $model tipoTelefono */

$this->breadcrumbs=array(
	'Tipo Telefonos'=>array('index'),
	$model->idtipo_telefono,
);

$this->menu=array(
	array('label'=>'List tipoTelefono', 'url'=>array('index')),
	array('label'=>'Create tipoTelefono', 'url'=>array('create')),
	array('label'=>'Update tipoTelefono', 'url'=>array('update', 'id'=>$model->idtipo_telefono)),
	array('label'=>'Delete tipoTelefono', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtipo_telefono),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tipoTelefono', 'url'=>array('admin')),
);
?>

<h1>View tipoTelefono #<?php echo $model->idtipo_telefono; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtipo_telefono',
		'desc',
	),
)); ?>
