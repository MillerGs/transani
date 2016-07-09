<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->idpersona=>array('view','id'=>$model->idpersona),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Persona', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Ver Persona', 'url'=>array('view', 'id'=>$model->idpersona)),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<h1>Actualizar Persona <?php echo $model->idpersona; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>