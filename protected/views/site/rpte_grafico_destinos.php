

<div class="row">
	<div class="col-md-3">
		<?php echo CHtml::dropDownList('id_ciudad','id_ciudad',CHtml::listData(Ciudad::model()->findAll(array('order' => 'ciudaddesc ASC'))),'id_ciudad','ciudaddesc'); ?>
	</div>
	<div class="col-md-9">

	</div>
</div>