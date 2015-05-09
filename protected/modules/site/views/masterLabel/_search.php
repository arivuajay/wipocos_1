<?php
/* @var $this MasterLabelController */
/* @var $model MasterLabel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Master_Label_Id'); ?>
		<?php echo $form->textField($model,'Master_Label_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Label_Code'); ?>
		<?php echo $form->textField($model,'Label_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Label_Name'); ?>
		<?php echo $form->textField($model,'Label_Name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
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