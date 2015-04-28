<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->title='Create Producer';
$this->breadcrumbs=array(
	'Producer'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model,'tab' => 1)); ?>
</div>
