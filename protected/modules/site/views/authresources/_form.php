<?php
/* @var $this AuthresourcesController */
/* @var $model AuthResources */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auth-resources-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_User_ID'); ?>
		<?php echo $form->textField($model,'Master_User_ID'); ?>
		<?php echo $form->error($model,'Master_User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Role_ID'); ?>
		<?php echo $form->textField($model,'Master_Role_ID'); ?>
		<?php echo $form->error($model,'Master_Role_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Module_ID'); ?>
		<?php echo $form->textField($model,'Master_Module_ID'); ?>
		<?php echo $form->error($model,'Master_Module_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Screen_ID'); ?>
		<?php echo $form->textField($model,'Master_Screen_ID'); ?>
		<?php echo $form->error($model,'Master_Screen_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Task_ADD'); ?>
		<?php echo $form->textField($model,'Master_Task_ADD',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'Master_Task_ADD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Task_SEE'); ?>
		<?php echo $form->textField($model,'Master_Task_SEE',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'Master_Task_SEE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Task_UPT'); ?>
		<?php echo $form->textField($model,'Master_Task_UPT',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'Master_Task_UPT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Master_Task_DEL'); ?>
		<?php echo $form->textField($model,'Master_Task_DEL',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'Master_Task_DEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Created_Date'); ?>
		<?php echo $form->textField($model,'Created_Date'); ?>
		<?php echo $form->error($model,'Created_Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Rowversion'); ?>
		<?php echo $form->textField($model,'Rowversion'); ?>
		<?php echo $form->error($model,'Rowversion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->