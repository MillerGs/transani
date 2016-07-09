<?php
/* @var $this MenuAccionController */
/* @var $model MenuAccion */

$this->breadcrumbs=array(
	'Menu Accions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MenuAccion', 'url'=>array('index')),
	array('label'=>'Manage MenuAccion', 'url'=>array('admin')),
);
?>

<h1>Create MenuAccion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>