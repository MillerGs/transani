<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */

$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Vehiculos', 'url'=>array('index')),
	array('label'=>'Administrar Vehiculos', 'url'=>array('admin')),
);
?>

<h1>Create Vehiculo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>