<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Sedes', 'url'=>array('index')),
	array('label'=>'Administrar Sedes', 'url'=>array('admin')),
);
?>

<h1>Crear Sede</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>