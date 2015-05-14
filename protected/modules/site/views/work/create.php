<?php
/* @var $this WorkController */
/* @var $model Work */

$this->title='Create Works';
$this->breadcrumbs=array(
	'Works'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
