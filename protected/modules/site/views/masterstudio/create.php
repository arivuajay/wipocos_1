<?php
/* @var $this MasterstudioController */
/* @var $model MasterStudio */

$this->title='Create Master Studios';
$this->breadcrumbs=array(
	'Master Studios'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
