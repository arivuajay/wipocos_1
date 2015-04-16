<?php
/* @var $this PublisheraccountController */
/* @var $model PublisherAccount */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Pub_Acc_Id'); ?>
		<?php echo $form->textField($model,'Pub_Acc_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Corporate_Name'); ?>
		<?php echo $form->textField($model,'Pub_Corporate_Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Internal_Code'); ?>
		<?php echo $form->textField($model,'Pub_Internal_Code',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Ipi'); ?>
		<?php echo $form->textField($model,'Pub_Ipi',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Ipi_Base_Number'); ?>
		<?php echo $form->textField($model,'Pub_Ipi_Base_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Date'); ?>
		<?php echo $form->textField($model,'Pub_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Place'); ?>
		<?php echo $form->textField($model,'Pub_Place',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Country_Id'); ?>
		<?php echo $form->textField($model,'Pub_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Legal_Form_id'); ?>
		<?php echo $form->textField($model,'Pub_Legal_Form_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Reg_Date'); ?>
		<?php echo $form->textField($model,'Pub_Reg_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Reg_Number'); ?>
		<?php echo $form->textField($model,'Pub_Reg_Number',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Excerpt_Date'); ?>
		<?php echo $form->textField($model,'Pub_Excerpt_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Language_Id'); ?>
		<?php echo $form->textField($model,'Pub_Language_Id',array('class'=>'form-control')); ?>
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