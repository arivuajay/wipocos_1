<?php
/* @var $this MasterstudioController */
/* @var $model MasterStudio */

$this->title='Update Master Studios: '. $model->Studio_Id;
$this->breadcrumbs=array(
	'Master Studios'=>array('index'),
	'Update Master Studios',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>