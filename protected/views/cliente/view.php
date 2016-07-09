<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idcliente,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->idcliente)),
	array('label'=>'Eliminar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcliente),'confirm'=>'Estás seguro(a) de eliminar este item?')),
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<h1>Ver Cliente #<?php echo $model->idcliente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcliente',
		'nombres',
		'nrodoc',
		'edad',
		'tipodoc',
		'apellidos',
	),
)); ?>
