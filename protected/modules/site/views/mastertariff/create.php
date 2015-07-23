<?php
/* @var $this MastertariffController */
/* @var $model MasterTariff */

$this->title='Create Master Tariffs';
$this->breadcrumbs=array(
	'Master Tariffs'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
