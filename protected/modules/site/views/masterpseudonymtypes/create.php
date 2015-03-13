<?php
/* @var $this MasterpseudonymtypesController */
/* @var $model MasterPseudonymTypes */

$this->title='Create Master Pseudonym Types';
$this->breadcrumbs=array(
	'Master Pseudonym Types'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
