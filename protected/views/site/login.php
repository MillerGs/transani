<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>




 <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
              <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label"><?php echo $form->labelEx($model,'username'); ?></label>
                                  
                                  <?php echo $form->textField($model,'username',array('size'=>60,'class'=>'form-control','placeholder'=>"nombre de usuario")); ?>
                                  <?php echo $form->error($model,'username'); ?>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label"><?php echo $form->labelEx($model,'password'); ?></label>
                                  <?php echo $form->passwordField($model,'password',array('size'=>60,'class'=>'form-control','placeholder'=>"Ingresa tu contraseña")); ?>
									<?php echo $form->error($model,'password'); ?>
                                  <span class="help-block"></span>
                              </div>
                              
                              <div class="checkbox">
                                  <label>
                                      
                                      <?php echo $form->checkBox($model,'rememberMe'); ?>
										<?php echo $form->label($model,'rememberMe'); ?>
										<?php echo $form->error($model,'rememberMe'); ?>
                                  </label>
                                  
                              </div>
                              <?php echo CHtml::submitButton('Login',array('class'=>"btn btn-success btn-block")); ?>
                              
                              <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                          </form>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>

  <?php $this->endWidget(); ?>