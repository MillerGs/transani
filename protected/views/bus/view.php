<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	$model->idbus,
);

$this->menu=array(
	array('label'=>'Listar Buses', 'url'=>array('index')),
	array('label'=>'Crear Bus', 'url'=>array('create')),
	array('label'=>'Actualizar Bus', 'url'=>array('update', 'id'=>$model->idbus)),
	array('label'=>'Eliminar Bus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbus),'confirm'=>'Estás seguro(a) de eliminar el item?')),
	array('label'=>'Administrar Buses', 'url'=>array('admin')),
);
?>

<h1>Ver Bus #<?php echo $model->idbus; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idbus', 
				'Chofer' => array(
			        'name'=>'idchofer',
			        'value'=>$model->idchofer0->nombres.' '.$model->idchofer0->apellidos
			     ),
		'placa',  
				'Copiloto' => array(
			        'name'=>'idcopiloto',
			        'value'=>$model->idcopiloto0->nombres.' '.$model->idcopiloto0->apellidos
			     ),
		'nros_asientos',
		'tipo_bus',
		'color',
	),
)); ?>
