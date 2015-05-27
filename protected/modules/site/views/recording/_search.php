<?php
/* @var $this RecordingController */
/* @var $model Recording */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Title'); ?>
		<?php echo $form->textField($model,'Rcd_Title',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Language_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Language_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Internal_Code'); ?>
		<?php echo $form->textField($model,'Rcd_Internal_Code',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Type_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Type_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Date'); ?>
		<?php echo $form->textField($model,'Rcd_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Duration'); ?>
		<?php echo $form->textField($model,'Rcd_Duration',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Record_Country_id'); ?>
		<?php echo $form->textField($model,'Rcd_Record_Country_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Product_Country_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Product_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Doc_Status_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Doc_Status_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Record_Type_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Record_Type_Id',array('class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Label_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Label_Id',array('class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Reference'); ?>
		<?php echo $form->textField($model,'Rcd_Reference',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_File'); ?>
		<?php echo $form->textField($model,'Rcd_File',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Isrc_Code'); ?>
		<?php echo $form->textField($model,'Rcd_Isrc_Code',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Iswc_Number'); ?>
		<?php echo $form->textField($model,'Rcd_Iswc_Number',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->