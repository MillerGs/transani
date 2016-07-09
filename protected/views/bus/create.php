<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Buses', 'url'=>array('index')),
	array('label'=>'Administrar Bus', 'url'=>array('admin')),
);
?>

<h1>Crear Bus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>