<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudades'=>array('index'),
	$model->idciudad,
);

$this->menu=array(
	array('label'=>'Listar Ciudades', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Actualizar Ciudad', 'url'=>array('update', 'id'=>$model->idciudad)),
	array('label'=>'Eliminar Ciudad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idciudad),'confirm'=>'Está seguro(a) de eliminar el item?')),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<h1>Ver Ciudad #<?php echo $model->idciudad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idciudad',
		'ciudaddesc',
	),
)); ?>
