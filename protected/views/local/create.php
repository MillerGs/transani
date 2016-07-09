<?php
/* @var $this LocalController */
/* @var $model Local */

$this->breadcrumbs=array(
	'Sucursal'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Sucursales', 'url'=>array('index')),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<h1>Crear Sucursal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>