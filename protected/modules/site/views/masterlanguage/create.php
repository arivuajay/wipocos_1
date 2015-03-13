<?php
/* @var $this MasterlanguageController */
/* @var $model MasterLanguage */

$this->title='Create Master Languages';
$this->breadcrumbs=array(
	'Master Languages'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
