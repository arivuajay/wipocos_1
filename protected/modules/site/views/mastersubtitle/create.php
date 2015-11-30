<?php
/* @var $this MastersubtitleController */
/* @var $model MasterSubtitleType */

$this->title='Create Master Subtitle Types';
$this->breadcrumbs=array(
	'Master Subtitle Types'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
