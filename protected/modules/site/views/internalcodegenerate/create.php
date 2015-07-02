<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */

$this->title='Create Internalcode Generates';
$this->breadcrumbs=array(
	'Internalcode Generates'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
