<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	$model->idsede=>array('view','id'=>$model->idsede),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Sedes', 'url'=>array('index')),
	array('label'=>'Crear Sede', 'url'=>array('create')),
	array('label'=>'Ver Sede', 'url'=>array('view', 'id'=>$model->idsede)),
	array('label'=>'Administrar Sede', 'url'=>array('admin')),
);
?>

<h1>Actualizar Sede <?php echo $model->idsede; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>