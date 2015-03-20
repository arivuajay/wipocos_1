<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->title='Create Organizations';
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
