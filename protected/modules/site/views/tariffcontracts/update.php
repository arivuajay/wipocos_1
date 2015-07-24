<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='Update Tariff Contracts: '. $model->Tarf_Cont_Id;
$this->breadcrumbs=array(
	'Tariff Contracts'=>array('index'),
	'Update Tariff Contracts',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>