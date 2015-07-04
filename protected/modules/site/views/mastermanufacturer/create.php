<?php
/* @var $this MastermanufacturerController */
/* @var $model MasterManufacturer */

$this->title='Create Master Manufacturers';
$this->breadcrumbs=array(
	'Master Manufacturers'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
