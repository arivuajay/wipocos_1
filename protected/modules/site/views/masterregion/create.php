<?php
/* @var $this MasterregionController */
/* @var $model MasterRegion */

$this->title='Create Master Regions';
$this->breadcrumbs=array(
	'Master Regions'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
