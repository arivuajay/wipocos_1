<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Id'); ?>
		<?php echo $form->textField($model,'Sound_Car_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_GUID'); ?>
		<?php echo $form->textField($model,'Sound_Car_GUID',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Title'); ?>
		<?php echo $form->textField($model,'Sound_Car_Title',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Language_Id'); ?>
		<?php echo $form->textField($model,'Sound_Car_Language_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Internal_Code'); ?>
		<?php echo $form->textField($model,'Sound_Car_Internal_Code',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Standardized_Code'); ?>
		<?php echo $form->textField($model,'Sound_Car_Standardized_Code',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Catelog'); ?>
		<?php echo $form->textField($model,'Sound_Car_Catelog',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Barcode'); ?>
		<?php echo $form->textField($model,'Sound_Car_Barcode',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Distributor'); ?>
		<?php echo $form->textField($model,'Sound_Car_Distributor',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Label_Id'); ?>
		<?php echo $form->textField($model,'Sound_Car_Label_Id',array('class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Medium'); ?>
		<?php echo $form->textField($model,'Sound_Car_Medium',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Type_Id'); ?>
		<?php echo $form->textField($model,'Sound_Car_Type_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Main_Artist'); ?>
		<?php echo $form->textField($model,'Sound_Car_Main_Artist',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Producer'); ?>
		<?php echo $form->textField($model,'Sound_Car_Producer',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Product_Country_Id'); ?>
		<?php echo $form->textField($model,'Sound_Car_Product_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Year'); ?>
		<?php echo $form->textField($model,'Sound_Car_Year',array('class'=>'form-control','size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Release_Year'); ?>
		<?php echo $form->textField($model,'Sound_Car_Release_Year',array('class'=>'form-control','size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound_Car_Manf_Id'); ?>
		<?php echo $form->textField($model,'Sound_Car_Manf_Id',array('class'=>'form-control')); ?>
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