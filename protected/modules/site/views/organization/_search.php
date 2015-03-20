<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Org_Id'); ?>
		<?php echo $form->textField($model,'Org_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Abbr_Id'); ?>
		<?php echo $form->textField($model,'Org_Abbr_Id',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Logo_File'); ?>
		<?php echo $form->textField($model,'Org_Logo_File',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Mailing_Address'); ?>
		<?php echo $form->textArea($model,'Org_Mailing_Address',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Country_Id'); ?>
		<?php echo $form->textField($model,'Org_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Territory_Id'); ?>
		<?php echo $form->textField($model,'Org_Territory_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Region_Id'); ?>
		<?php echo $form->textField($model,'Org_Region_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Profession_Id'); ?>
		<?php echo $form->textField($model,'Org_Profession_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Role_Id'); ?>
		<?php echo $form->textField($model,'Org_Role_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Hirearchy_Id'); ?>
		<?php echo $form->textField($model,'Org_Hirearchy_Id',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Payment_Id'); ?>
		<?php echo $form->textField($model,'Org_Payment_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Type_Id'); ?>
		<?php echo $form->textField($model,'Org_Type_Id',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Factor_Id'); ?>
		<?php echo $form->textField($model,'Org_Factor_Id',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Doc_Type_Id'); ?>
		<?php echo $form->textField($model,'Org_Doc_Type_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Doc_Id'); ?>
		<?php echo $form->textField($model,'Org_Doc_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Duration'); ?>
		<?php echo $form->textField($model,'Org_Duration',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_CopyRight'); ?>
		<?php echo $form->textField($model,'Org_CopyRight',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_RelatedRights'); ?>
		<?php echo $form->textField($model,'Org_RelatedRights',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Currency'); ?>
		<?php echo $form->textField($model,'Org_Currency',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Rate'); ?>
		<?php echo $form->textField($model,'Org_Rate',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Main_Performer_Id'); ?>
		<?php echo $form->textField($model,'Org_Main_Performer_Id',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Org_Producer_Id'); ?>
		<?php echo $form->textField($model,'Org_Producer_Id',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
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