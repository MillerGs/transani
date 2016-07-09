<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->idempresa,
);

$this->menu=array(
	array('label'=>'Listar Empresas', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Actualizar Empresa', 'url'=>array('update', 'id'=>$model->idempresa)),
	array('label'=>'Eliminar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idempresa),'confirm'=>'Estás seguro(a) de eliminar la empresa?')),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<h1>Ver Empresa #<?php echo $model->idempresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idempresa',
		'ruc',
		'razon',
		'ubicacion',
	),
)); ?>
