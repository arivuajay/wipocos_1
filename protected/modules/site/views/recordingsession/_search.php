<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_GUID'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_GUID',array('class'=>'form-control','size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Title'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Title',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Internal_Code'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Internal_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Language_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Language_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Orchestra'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Orchestra',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Ref_Medium'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Ref_Medium',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Hours'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Hours',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Record_Date'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Record_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Studio_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Studio_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Producer'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Producer',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Main_Artist'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Main_Artist',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Medium_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Medium_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Type_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Type_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Destination_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Destination_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Country_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Factor_Id'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Factor_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rcd_Ses_Release_Year'); ?>
		<?php echo $form->textField($model,'Rcd_Ses_Release_Year',array('class'=>'form-control','size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->