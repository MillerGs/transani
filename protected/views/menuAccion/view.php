<?php
/* @var $this MenuAccionController */
/* @var $model MenuAccion */

$this->breadcrumbs=array(
	'Menu Accions'=>array('index'),
	$model->idaccion,
);

$this->menu=array(
	array('label'=>'List MenuAccion', 'url'=>array('index')),
	array('label'=>'Create MenuAccion', 'url'=>array('create')),
	array('label'=>'Update MenuAccion', 'url'=>array('update', 'id'=>$model->idaccion)),
	array('label'=>'Delete MenuAccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idaccion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MenuAccion', 'url'=>array('admin')),
);
?>

<h1>View MenuAccion #<?php echo $model->idaccion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idaccion',
		'idmenu',
		'accion_desc',
	),
)); ?>
