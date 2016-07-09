<?php
/* @var $this ConductorController */
/* @var $model Conductor */

$this->breadcrumbs=array(
	'Conductors'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Conductor', 'url'=>array('index')),
	array('label'=>'Administrar Conductor', 'url'=>array('admin')),
);
?>

<h1>Crear Conductor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>