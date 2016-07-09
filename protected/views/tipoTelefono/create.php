<?php
/* @var $this TipoTelefonoController */
/* @var $model tipoTelefono */

$this->breadcrumbs=array(
	'Tipo Telefonos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tipoTelefono', 'url'=>array('index')),
	array('label'=>'Manage tipoTelefono', 'url'=>array('admin')),
);
?>

<h1>Create tipoTelefono</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>