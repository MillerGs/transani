<?php
/* @var $this MenusController */
/* @var $model Menus */

$this->breadcrumbs=array(
	'Menuses'=>array('index'),
	$model->idmenu,
);

$this->menu=array(
	array('label'=>'List Menus', 'url'=>array('index')),
	array('label'=>'Create Menus', 'url'=>array('create')),
	array('label'=>'Update Menus', 'url'=>array('update', 'id'=>$model->idmenu)),
	array('label'=>'Delete Menus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmenu),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Menus', 'url'=>array('admin')),
);
?>

<h1>View Menus #<?php echo $model->idmenu; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmenu',
		'menu_desc',
	),
)); ?>
