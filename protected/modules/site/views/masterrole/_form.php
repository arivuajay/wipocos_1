<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'master-role-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Role_Code'); ?>
		<?php echo $form->textField($model,'Role_Code',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Role_Code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_Admin'); ?>
		<?php echo $form->textField($model,'is_Admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_Admin'); ?>
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