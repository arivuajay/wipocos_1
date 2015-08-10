<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='Create Tariff / Contract';
$this->breadcrumbs=array(
	'Tariff / Contract'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
