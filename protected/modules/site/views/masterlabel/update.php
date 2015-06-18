<?php
/* @var $this MasterLabelController */
/* @var $model MasterLabel */

$this->title='Update Master Label: '. $model->Label_Name;
$this->breadcrumbs=array(
	'Master Labels'=>array('index'),
	'Update Master Labels',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>