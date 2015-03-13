<?php
/* @var $this MasterterritoriesController */
/* @var $model MasterTerritories */

$this->title='Create Master Territories';
$this->breadcrumbs=array(
	'Master Territories'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
