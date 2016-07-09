<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Sedes', 'url'=>array('index')),
	array('label'=>'Crear Sedes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sede-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Sedes</h1>

 
<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sede-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idsede',
		'sede_desc',
		'serie',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
