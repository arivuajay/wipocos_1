<?php
/* @var $this EmailtemplateController */
/* @var $model EmailTemplate */

$this->title='Update Email Templates: '. $model->Email_Temp_Id;
$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	'Update Email Templates',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>