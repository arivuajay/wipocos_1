<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */

$this->title='Create Performer';
$this->breadcrumbs=array(
	'Performers'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model,'address_model' => $address_model, 'tab' => $tab)); ?>
</div>
