<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Perf_Acc_Id'); ?>
		<?php echo $form->textField($model,'Perf_Acc_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Sur_Name'); ?>
		<?php echo $form->textField($model,'Perf_Sur_Name',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_First_Name'); ?>
		<?php echo $form->textField($model,'Perf_First_Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Internal_Code'); ?>
		<?php echo $form->textField($model,'Perf_Internal_Code',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Ipi_Number'); ?>
		<?php echo $form->textField($model,'Perf_Ipi_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Ipi_Base_Number'); ?>
		<?php echo $form->textField($model,'Perf_Ipi_Base_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Ipn_Number'); ?>
		<?php echo $form->textField($model,'Perf_Ipn_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Date_Of_Birth'); ?>
		<?php echo $form->textField($model,'Perf_Date_Of_Birth',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Place_Of_Birth_Id'); ?>
		<?php echo $form->textField($model,'Perf_Place_Of_Birth_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Birth_Country_Id'); ?>
		<?php echo $form->textField($model,'Perf_Birth_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Nationality_Id'); ?>
		<?php echo $form->textField($model,'Perf_Nationality_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Language_Id'); ?>
		<?php echo $form->textField($model,'Perf_Language_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Identity_Number'); ?>
		<?php echo $form->textField($model,'Perf_Identity_Number',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Marital_Status_Id'); ?>
		<?php echo $form->textField($model,'Perf_Marital_Status_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Spouse_Name'); ?>
		<?php echo $form->textField($model,'Perf_Spouse_Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Perf_Gender'); ?>
		<?php echo $form->textField($model,'Perf_Gender',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
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