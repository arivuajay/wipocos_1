<?php
/* @var $this MastercityController */
/* @var $model MasterCity */

$this->title='Create Master Cities';
$this->breadcrumbs=array(
	'Master Cities'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
