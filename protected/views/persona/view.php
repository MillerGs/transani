<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->idpersona,
);

$this->menu=array(
	array('label'=>'Listar Personas', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Actualizar Persona', 'url'=>array('update', 'id'=>$model->idpersona)),
	array('label'=>'Eliminar Persona', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpersona),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<h1>Ver Persona #<?php echo $model->idpersona; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpersona',
		'dni',
		'nombres',
		'apellidos',
		'celular',
		'foto',
		'idempresa',
	),
)); ?>
