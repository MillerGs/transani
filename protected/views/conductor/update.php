<?php
/* @var $this ConductorController */
/* @var $model Conductor */

$this->breadcrumbs=array(
	'Conductores'=>array('index'),
	$model->idconductor=>array('view','id'=>$model->idconductor),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Conductores', 'url'=>array('index')),
	array('label'=>'Crear Conductor', 'url'=>array('create')),
	array('label'=>'Ver Conductor', 'url'=>array('view', 'id'=>$model->idconductor)),
	array('label'=>'Administrar Conductor', 'url'=>array('admin')),
);
?>

<h1>Actualizar Conductor <?php echo $model->idconductor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>