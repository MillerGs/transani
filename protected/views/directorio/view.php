<?php
/* @var $this DirectorioController */
/* @var $model Directorio */

$this->breadcrumbs=array(
	'Directorios'=>array('index'),
	$model->iddirectorio,
);

$this->menu=array(
	array('label'=>'Listar Directorio', 'url'=>array('index')),
	array('label'=>'Crear Directorio', 'url'=>array('create')),
	array('label'=>'Editar Directorio', 'url'=>array('update', 'id'=>$model->iddirectorio)),
	array('label'=>'Eliminar Directorio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iddirectorio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Directorio', 'url'=>array('admin')),
);
?>

<h1>View Directorio #<?php echo $model->iddirectorio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iddirectorio',
		'idtipo_telefono',
		'tel_numero',
		'directoriocol',
		'idLocal',
	),
)); ?>
