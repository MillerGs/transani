<?php
/* @var $this ConductorController */
/* @var $model Conductor */

$this->breadcrumbs=array(
	'Conductores'=>array('index'),
	$model->idconductor,
);

$this->menu=array(
	array('label'=>'Listar Conductor', 'url'=>array('index')),
	array('label'=>'Crear Conductor', 'url'=>array('create')),
	array('label'=>'Actualizar Conductor', 'url'=>array('update', 'id'=>$model->idconductor)),
	array('label'=>'Eliminar Conductor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idconductor),'confirm'=>'Está seguro(a) de eliminar el item?')),
	array('label'=>'Administrar Conductor', 'url'=>array('admin')),
);
?>

<h1>Ver Conductor #<?php echo $model->idconductor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idconductor',
		'idpersona',
		'idvehiculo',
		'fecha',
		'hora_partida',
	),
)); ?>
