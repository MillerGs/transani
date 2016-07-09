<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->idempresa=>array('view','id'=>$model->idempresa),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Empresas', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Ver Empresa', 'url'=>array('view', 'id'=>$model->idempresa)),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Empresa <?php echo $model->idempresa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>