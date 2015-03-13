<?php
/* @var $this MasterprofessionController */
/* @var $model MasterProfession */

$this->title='Create Master Professions';
$this->breadcrumbs=array(
	'Master Professions'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
