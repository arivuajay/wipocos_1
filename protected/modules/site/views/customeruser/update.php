<?php
/* @var $this CustomeruserController */
/* @var $model CustomerUser */

$this->title='Update Users & Customers: '. $model->User_Cust_Id;
$this->breadcrumbs=array(
	'Users & Customers'=>array('index'),
	'Update Users & Customers',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>