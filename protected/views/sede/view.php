<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	$model->idsede,
);

$this->menu=array(
	array('label'=>'Listar Sedes', 'url'=>array('index')),
	array('label'=>'Crear Sede', 'url'=>array('create')),
	array('label'=>'Actualizar Sede', 'url'=>array('update', 'id'=>$model->idsede)),
	array('label'=>'Eliminar Sede', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsede),'confirm'=>'Está seguro(a) de eliminar el item?')),
	array('label'=>'Administrar Sede', 'url'=>array('admin')),
);
?>

<h1>Ver Sede #<?php echo $model->idsede; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idsede',
		'sede_desc',
		'serie',
	),
)); ?>
