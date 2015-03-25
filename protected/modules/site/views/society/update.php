<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title='Update Societies: '. $model->Society_Id;
$this->breadcrumbs=array(
	'Societies'=>array('index'),
	'Update Societies',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>