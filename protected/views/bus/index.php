<?php
/* @var $this BusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Buses',
);

$this->menu=array(
	array('label'=>'Crear Bus', 'url'=>array('create')),
	array('label'=>'Administrar Bus', 'url'=>array('admin')),
);
?>

<h1>Buses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
