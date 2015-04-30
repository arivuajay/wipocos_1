<?php
/* @var $this AudittrailController */
/* @var $model AuditTrail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'aud_id'); ?>
		<?php echo $form->textField($model,'aud_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aud_user'); ?>
		<?php echo $form->textField($model,'aud_user',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aud_class'); ?>
		<?php echo $form->textField($model,'aud_class',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aud_action'); ?>
		<?php echo $form->textField($model,'aud_action',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aud_message'); ?>
		<?php echo $form->textField($model,'aud_message',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aud_ip_address'); ?>
		<?php echo $form->textField($model,'aud_ip_address',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aud_created_date'); ?>
		<?php echo $form->textField($model,'aud_created_date',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->