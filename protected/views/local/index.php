<?php
/* @var $this LocalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sucursales',
);

$this->menu=array(
	array('label'=>'Crear Sucursal', 'url'=>array('create')),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<h1>Sucursales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
