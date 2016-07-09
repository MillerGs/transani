<?php
/* @var $this LocalController */
/* @var $model Local */

$this->breadcrumbs=array(
	'Locals'=>array('index'),
	$model->idLocal,
);

$this->menu=array(
	array('label'=>'Listar Sucursales', 'url'=>array('index')),
	array('label'=>'Crear Sucursal', 'url'=>array('create')),
	array('label'=>'Editar Sucursal', 'url'=>array('update', 'id'=>$model->idLocal)),
	array('label'=>'Eliminar Sucursal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLocal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<h1>Sucursal #<?php echo $model->idLocal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idempresa',
		'local_desc',
		'direccion',
	),
)); ?>
