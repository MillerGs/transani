<?php
/* @var $this TipoTelefonoController */
/* @var $model tipoTelefono */

$this->breadcrumbs=array(
	'Tipo Telefonos'=>array('index'),
	$model->idtipo_telefono=>array('view','id'=>$model->idtipo_telefono),
	'Update',
);

$this->menu=array(
	array('label'=>'List tipoTelefono', 'url'=>array('index')),
	array('label'=>'Create tipoTelefono', 'url'=>array('create')),
	array('label'=>'View tipoTelefono', 'url'=>array('view', 'id'=>$model->idtipo_telefono)),
	array('label'=>'Manage tipoTelefono', 'url'=>array('admin')),
);
?>

<h1>Update tipoTelefono <?php echo $model->idtipo_telefono; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>