<?php
/* @var $this MastermediumController */
/* @var $model MasterMedium */

$this->title='Create Master Media';
$this->breadcrumbs=array(
	'Master Media'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
