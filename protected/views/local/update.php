<?php
/* @var $this LocalController */
/* @var $model Local */

$this->breadcrumbs=array(
	'Locals'=>array('index'),
	$model->idLocal=>array('view','id'=>$model->idLocal),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Sucursales', 'url'=>array('index')),
	array('label'=>'Crear Sucursal', 'url'=>array('create')),
	array('label'=>'Ver Sucursal', 'url'=>array('view', 'id'=>$model->idLocal)),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<h1>Editar Sucursal <?php echo $model->idLocal; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>