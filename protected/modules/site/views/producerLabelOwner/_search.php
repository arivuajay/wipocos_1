<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Label_Owner_Id'); ?>
		<?php echo $form->textField($model,'Label_Owner_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pro_Acc_Id'); ?>
		<?php echo $form->textField($model,'Pro_Acc_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Label_Id'); ?>
		<?php echo $form->textField($model,'Label_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Label_Owner_From'); ?>
		<?php echo $form->textField($model,'Label_Owner_From',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Label_Owner_To'); ?>
		<?php echo $form->textField($model,'Label_Owner_To',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Label_Share'); ?>
		<?php echo $form->textField($model,'Label_Share',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
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