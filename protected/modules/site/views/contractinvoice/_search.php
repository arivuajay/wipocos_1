<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Inv_Id'); ?>
		<?php echo $form->textField($model,'Inv_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Inv_Date'); ?>
		<?php echo $form->textField($model,'Inv_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Inv_Repeat_Id'); ?>
		<?php echo $form->textField($model,'Inv_Repeat_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Inv_Repeat_Count'); ?>
		<?php echo $form->textField($model,'Inv_Repeat_Count',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Inv_Next_Date'); ?>
		<?php echo $form->textField($model,'Inv_Next_Date',array('class'=>'form-control')); ?>
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