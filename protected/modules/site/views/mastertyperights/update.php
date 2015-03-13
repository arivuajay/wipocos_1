<?php
/* @var $this MastertyperightsController */
/* @var $model MasterTypeRights */

$this->title='Update Master Type Rights: '. $model->Master_Type_Rights_Id;
$this->breadcrumbs=array(
	'Master Type Rights'=>array('index'),
	'Update Master Type Rights',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>