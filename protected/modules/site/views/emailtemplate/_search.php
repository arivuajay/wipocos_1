<?php
/* @var $this EmailtemplateController */
/* @var $model EmailTemplate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_Id'); ?>
		<?php echo $form->textField($model,'Email_Temp_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_Name'); ?>
		<?php echo $form->textField($model,'Email_Temp_Name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_From'); ?>
		<?php echo $form->textField($model,'Email_Temp_From',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_ReplyTo'); ?>
		<?php echo $form->textField($model,'Email_Temp_ReplyTo',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_Subject'); ?>
		<?php echo $form->textField($model,'Email_Temp_Subject',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_Content'); ?>
		<?php echo $form->textArea($model,'Email_Temp_Content',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email_Temp_Params'); ?>
		<?php echo $form->textField($model,'Email_Temp_Params',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created_Date'); ?>
		<?php echo $form->textField($model,'Created_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rowversion'); ?>
		<?php echo $form->textField($model,'Rowversion',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created_By'); ?>
		<?php echo $form->textField($model,'Created_By',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Updated_By'); ?>
		<?php echo $form->textField($model,'Updated_By',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->