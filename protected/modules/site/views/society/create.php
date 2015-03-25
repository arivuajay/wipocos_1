<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title='Create Societies';
$this->breadcrumbs=array(
	'Societies'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
