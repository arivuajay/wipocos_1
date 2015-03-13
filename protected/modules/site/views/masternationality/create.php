<?php
/* @var $this MasternationalityController */
/* @var $model MasterNationality */

$this->title='Create Master Nationalities';
$this->breadcrumbs=array(
	'Master Nationalities'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
