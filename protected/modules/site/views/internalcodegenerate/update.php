<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */

$this->title='Update Internalcode Generates: '. $model->Gen_Inter_Code_Id;
$this->breadcrumbs=array(
	'Internalcode Generates'=>array('index'),
	'Update Internalcode Generates',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>