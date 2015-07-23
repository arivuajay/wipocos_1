<?php
/* @var $this InspectorController */
/* @var $model Inspector */

$this->title='Update Inspectors: '. $model->Insp_Id;
$this->breadcrumbs=array(
	'Inspectors'=>array('index'),
	'Update Inspectors',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>