<?php
/* @var $this MasterLabelController */
/* @var $model MasterLabel */

$this->title='Update Master Labels: '. $model->Master_Label_Id;
$this->breadcrumbs=array(
	'Master Labels'=>array('index'),
	'Update Master Labels',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>