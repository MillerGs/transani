<?php
/* @var $this MenuAccionController */
/* @var $model MenuAccion */

$this->breadcrumbs=array(
	'Menu Accions'=>array('index'),
	$model->idaccion=>array('view','id'=>$model->idaccion),
	'Update',
);

$this->menu=array(
	array('label'=>'List MenuAccion', 'url'=>array('index')),
	array('label'=>'Create MenuAccion', 'url'=>array('create')),
	array('label'=>'View MenuAccion', 'url'=>array('view', 'id'=>$model->idaccion)),
	array('label'=>'Manage MenuAccion', 'url'=>array('admin')),
);
?>

<h1>Update MenuAccion <?php echo $model->idaccion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>