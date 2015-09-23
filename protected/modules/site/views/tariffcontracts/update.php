<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='Update Contract: '. $model->tarfContUser->User_Cust_Name;
$this->breadcrumbs=array(
	'Contract'=>array('index'),
	'Update Contract',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model, 'email_model' => $email_model,)); ?></div>