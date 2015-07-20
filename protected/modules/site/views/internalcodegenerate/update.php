<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */

$this->title='Update Code Definition Master: '. $model->Gen_Inter_Code;
$this->breadcrumbs=array(
	'Internalcode Generates'=>array('index'),
	'Update Code Definition Master ',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>