<?php
/* @var $this DirectorioController */
/* @var $model Directorio */

$this->breadcrumbs=array(
	'Directorios'=>array('index'),
	$model->iddirectorio=>array('view','id'=>$model->iddirectorio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Directorio', 'url'=>array('index')),
	array('label'=>'Create Directorio', 'url'=>array('create')),
	array('label'=>'View Directorio', 'url'=>array('view', 'id'=>$model->iddirectorio)),
	array('label'=>'Manage Directorio', 'url'=>array('admin')),
);
?>

<h1>Update Directorio <?php echo $model->iddirectorio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>