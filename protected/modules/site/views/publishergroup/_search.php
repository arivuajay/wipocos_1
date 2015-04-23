<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Id'); ?>
		<?php echo $form->textField($model,'Pub_Group_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Name'); ?>
		<?php echo $form->textField($model,'Pub_Group_Name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Is_Publisher'); ?>
		<?php echo $form->textField($model,'Pub_Group_Is_Publisher',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Is_Producer'); ?>
		<?php echo $form->textField($model,'Pub_Group_Is_Producer',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Internal_Code'); ?>
		<?php echo $form->textField($model,'Pub_Internal_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_IPI_Name_Number'); ?>
		<?php echo $form->textField($model,'Pub_IPI_Name_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_IPN_Base_Number'); ?>
		<?php echo $form->textField($model,'Pub_IPN_Base_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_IPD_Number'); ?>
		<?php echo $form->textField($model,'Pub_Group_IPD_Number',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Date'); ?>
		<?php echo $form->textField($model,'Pub_Group_Date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Place'); ?>
		<?php echo $form->textField($model,'Pub_Group_Place',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Country_Id'); ?>
		<?php echo $form->textField($model,'Pub_Group_Country_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Legal_Form_Id'); ?>
		<?php echo $form->textField($model,'Pub_Group_Legal_Form_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pub_Group_Language_Id'); ?>
		<?php echo $form->textField($model,'Pub_Group_Language_Id',array('class'=>'form-control')); ?>
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