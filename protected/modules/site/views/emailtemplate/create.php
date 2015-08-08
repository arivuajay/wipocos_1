<?php
/* @var $this EmailtemplateController */
/* @var $model EmailTemplate */

$this->title='Create Email Templates';
$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
