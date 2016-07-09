<?php
/* @var $this MenusController */
/* @var $model Menus */

$this->breadcrumbs=array(
	'Menuses'=>array('index'),
	$model->idmenu=>array('view','id'=>$model->idmenu),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menus', 'url'=>array('index')),
	array('label'=>'Create Menus', 'url'=>array('create')),
	array('label'=>'View Menus', 'url'=>array('view', 'id'=>$model->idmenu)),
	array('label'=>'Manage Menus', 'url'=>array('admin')),
);
?>

<h1>Update Menus <?php echo $model->idmenu; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>