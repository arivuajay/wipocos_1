<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_GUID'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_GUID',array('class'=>'form-control','size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Internal_Code'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Internal_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_City_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_City_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_District'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_District',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Area'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Area',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Tariff_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Tariff_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Insp_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Insp_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Balance'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Balance',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Amt_Pay'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Amt_Pay',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_From'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_From',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_To'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_To',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Sign_Date'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Sign_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Pay_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Pay_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Portion'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Portion',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Comment'); ?>
		<?php echo $form->textArea($model,'Tarf_Cont_Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Event_Id'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Event_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Event_Date'); ?>
		<?php echo $form->textField($model,'Tarf_Cont_Event_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tarf_Cont_Event_Comment'); ?>
		<?php echo $form->textArea($model,'Tarf_Cont_Event_Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
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