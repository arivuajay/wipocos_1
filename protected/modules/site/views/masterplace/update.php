<?php
/* @var $this MasterplaceController */
/* @var $model MasterPlace */

$this->title='Update Master Places: '. $model->Place_Name;
$this->breadcrumbs=array(
	'Master Places'=>array('index'),
	'Update Master Places',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>