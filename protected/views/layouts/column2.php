<?php /* @var $this Controller */ ?>
<div class="row">
	<?php $this->beginContent('//layouts/main'); ?>

	<div class="col-md-3" >
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operaciones',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
	<div class="col-md-9">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<?php $this->endContent(); ?>

</div>