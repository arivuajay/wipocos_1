<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Gen_Inter_Code_Id'); ?>
		<?php echo $form->textField($model,'Gen_Inter_Code_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gen_User_Type'); ?>
		<?php echo $form->textField($model,'Gen_User_Type',array('class'=>'form-control','size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gen_Prefix'); ?>
		<?php echo $form->textField($model,'Gen_Prefix',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gen_Inter_Code'); ?>
		<?php echo $form->textField($model,'Gen_Inter_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gen_Suffix'); ?>
		<?php echo $form->textField($model,'Gen_Suffix',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gen_Code_Pad'); ?>
		<?php echo $form->textField($model,'Gen_Code_Pad',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->