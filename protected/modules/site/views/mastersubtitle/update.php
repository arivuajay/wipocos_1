<?php
/* @var $this MastersubtitleController */
/* @var $model MasterSubtitleType */

$this->title='Update Master Subtitle Types: '. $model->Master_Subtitle_Id;
$this->breadcrumbs=array(
	'Master Subtitle Types'=>array('index'),
	'Update Master Subtitle Types',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>