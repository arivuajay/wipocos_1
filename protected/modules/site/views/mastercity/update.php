<?php
/* @var $this MastercityController */
/* @var $model MasterCity */

$this->title='Update Master Cities: '. $model->City_Name;
$this->breadcrumbs=array(
	'Master Cities'=>array('index'),
	'Update Master Cities',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>