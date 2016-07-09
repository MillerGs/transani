<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudads'=>array('index'),
	$model->idciudad=>array('view','id'=>$model->idciudad),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Ciudades', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Ver Ciudad', 'url'=>array('view', 'id'=>$model->idciudad)),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<h1>Actualizar Ciudad <?php echo $model->idciudad; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>