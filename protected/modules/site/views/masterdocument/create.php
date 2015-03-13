<?php
/* @var $this MasterdocumentController */
/* @var $model MasterDocument */

$this->title='Create Master Documents';
$this->breadcrumbs=array(
	'Master Documents'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
