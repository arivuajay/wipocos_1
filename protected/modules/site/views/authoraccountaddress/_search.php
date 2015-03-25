<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Auth_Addr_Id'); ?>
		<?php echo $form->textField($model,'Auth_Addr_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Acc_Id'); ?>
		<?php echo $form->textField($model,'Auth_Acc_Id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Address_1'); ?>
		<?php echo $form->textField($model,'Auth_Home_Address_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Address_2'); ?>
		<?php echo $form->textField($model,'Auth_Home_Address_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Address_3'); ?>
		<?php echo $form->textField($model,'Auth_Home_Address_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Fax'); ?>
		<?php echo $form->textField($model,'Auth_Home_Fax',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Telephone'); ?>
		<?php echo $form->textField($model,'Auth_Home_Telephone',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Email'); ?>
		<?php echo $form->textField($model,'Auth_Home_Email',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Home_Website'); ?>
		<?php echo $form->textField($model,'Auth_Home_Website',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Address_1'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Address_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Address_2'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Address_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Address_3'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Address_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Telephone'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Telephone',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Fax'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Fax',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Email'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Email',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Mailing_Website'); ?>
		<?php echo $form->textField($model,'Auth_Mailing_Website',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Author_Account_1'); ?>
		<?php echo $form->textField($model,'Auth_Author_Account_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Author_Account_2'); ?>
		<?php echo $form->textField($model,'Auth_Author_Account_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Author_Account_3'); ?>
		<?php echo $form->textField($model,'Auth_Author_Account_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Performer_Account_1'); ?>
		<?php echo $form->textField($model,'Auth_Performer_Account_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Performer_Account_2'); ?>
		<?php echo $form->textField($model,'Auth_Performer_Account_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Performer_Account_3'); ?>
		<?php echo $form->textField($model,'Auth_Performer_Account_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Auth_Unknown_Address'); ?>
		<?php echo $form->textField($model,'Auth_Unknown_Address',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
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