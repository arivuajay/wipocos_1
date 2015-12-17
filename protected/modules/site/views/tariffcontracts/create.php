<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='Create Contract';
$this->breadcrumbs=array(
	'Contract'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model','contract_event_by_progress')); ?>
</div>
