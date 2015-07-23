<?php
/* @var $this MasterplaceController */
/* @var $model MasterPlace */

$this->title='Create Master Places';
$this->breadcrumbs=array(
	'Master Places'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
