<?php
/* @var $this CustomeruserController */
/* @var $model CustomerUser */

$this->title='Create Users & Customers';
$this->breadcrumbs=array(
	'Users & Customers'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
