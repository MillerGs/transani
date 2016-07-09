<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */

$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	$model->idvehiculo=>array('view','id'=>$model->idvehiculo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vehiculo', 'url'=>array('index')),
	array('label'=>'Create Vehiculo', 'url'=>array('create')),
	array('label'=>'View Vehiculo', 'url'=>array('view', 'id'=>$model->idvehiculo)),
	array('label'=>'Manage Vehiculo', 'url'=>array('admin')),
);
?>

<h1>Update Vehiculo <?php echo $model->idvehiculo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>