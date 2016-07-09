<?php
/* @var $this DirectorioController */
/* @var $model Directorio */

$this->breadcrumbs=array(
	'Directorios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Directorio', 'url'=>array('index')),
	array('label'=>'Manage Directorio', 'url'=>array('admin')),
);
?>

<h1>Create Directorio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>