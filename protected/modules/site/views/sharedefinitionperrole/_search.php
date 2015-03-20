<?php
/* @var $this SharedefinitionperroleController */
/* @var $model ShareDefinitionPerRole */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Shr_Def_Id'); ?>
		<?php echo $form->textField($model,'Shr_Def_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Shr_Def_Role'); ?>
		<?php echo $form->textField($model,'Shr_Def_Role',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Shr_Def_Equ_remn'); ?>
		<?php echo $form->textField($model,'Shr_Def_Equ_remn',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Shr_Def_Blank_Tape_remn'); ?>
		<?php echo $form->textField($model,'Shr_Def_Blank_Tape_remn',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Shr_Def_Neigh_Rgts'); ?>
		<?php echo $form->textField($model,'Shr_Def_Neigh_Rgts',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Shr_Def_Excl_Rgts'); ?>
		<?php echo $form->textField($model,'Shr_Def_Excl_Rgts',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Active'); ?>
		<?php echo $form->checkBox($model,'Active',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created_Date'); ?>
		<?php echo $form->textField($model,'Created_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rowversion'); ?>
		<?php echo $form->textField($model,'Rowversion',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->