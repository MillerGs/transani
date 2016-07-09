<?php
/* @var $this RolController */
/* @var $model Rol */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->idrol=>array('view','id'=>$model->idrol),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rol', 'url'=>array('index')),
	array('label'=>'Create Rol', 'url'=>array('create')),
	array('label'=>'View Rol', 'url'=>array('view', 'id'=>$model->idrol)),
	array('label'=>'Manage Rol', 'url'=>array('admin')),
);
?>

<h1>Update Rol <?php echo $model->idrol; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>