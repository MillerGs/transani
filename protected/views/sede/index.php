<?php
/* @var $this SedeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sedes',
);

$this->menu=array(
	array('label'=>'Crear Sede', 'url'=>array('create')),
	array('label'=>'Administrar Sede', 'url'=>array('admin')),
);
?>

<h1>Sedes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
