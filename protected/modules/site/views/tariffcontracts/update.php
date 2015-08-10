<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='Update Tariff / Contract: '. $model->Tarf_Cont_Id;
$this->breadcrumbs=array(
	'Tariff / Contract'=>array('index'),
	'Update Tariff / Contract',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>