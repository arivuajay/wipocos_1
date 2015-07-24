<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='Create Tariff Contracts';
$this->breadcrumbs=array(
	'Tariff Contracts'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
