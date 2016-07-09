<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	$model->idbus=>array('view','id'=>$model->idbus),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Buses', 'url'=>array('index')),
	array('label'=>'Crear Bus', 'url'=>array('create')),
	array('label'=>'Ver Bus', 'url'=>array('view', 'id'=>$model->idbus)),
	array('label'=>'Administrar Bus', 'url'=>array('admin')),
);
?>

<h1>Actualizar Bus <?php echo $model->idbus; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>