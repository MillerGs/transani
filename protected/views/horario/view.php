<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->idhorario,
);

$this->menu=array(
	array('label'=>'List Horario', 'url'=>array('index')),
	array('label'=>'Create Horario', 'url'=>array('create')),
	array('label'=>'Update Horario', 'url'=>array('update', 'id'=>$model->idhorario)),
	array('label'=>'Delete Horario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhorario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Horario', 'url'=>array('admin')),
);
?>

<h1>View Horario #<?php echo $model->idhorario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idhorario',
		'idruta',
		'tipo_bus',
		'hora_sal',
		'fecha_sal',
	),
)); ?>
