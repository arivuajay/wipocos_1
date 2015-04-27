<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Pro_Acc_Id'); ?>
		<?php echo $form->textField($model,'Pro_Acc_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Corporate_Name'); ?>
		<?php echo $form->textField($model,'Pro_Corporate_Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Internal_Code'); ?>
		<?php echo $form->textField($model,'Pro_Internal_Code',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Ipi'); ?>
		<?php echo $form->textField($model,'Pro_Ipi',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Ipi_Base_Number'); ?>
		<?php echo $form->textField($model,'Pro_Ipi_Base_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Date'); ?>
		<?php echo $form->textField($model,'Pro_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Place'); ?>
		<?php echo $form->textField($model,'Pro_Place',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Country_Id'); ?>
		<?php echo $form->textField($model,'Pro_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Legal_Form_id'); ?>
		<?php echo $form->textField($model,'Pro_Legal_Form_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Reg_Date'); ?>
		<?php echo $form->textField($model,'Pro_Reg_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Reg_Number'); ?>
		<?php echo $form->textField($model,'Pro_Reg_Number',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Excerpt_Date'); ?>
		<?php echo $form->textField($model,'Pro_Excerpt_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Language_Id'); ?>
		<?php echo $form->textField($model,'Pro_Language_Id',array('class'=>'form-control')); ?>
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