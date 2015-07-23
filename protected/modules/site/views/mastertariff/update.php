<?php
/* @var $this MastertariffController */
/* @var $model MasterTariff */

$this->title='Update Master Tariffs: '. $model->Master_Tarif_Id;
$this->breadcrumbs=array(
	'Master Tariffs'=>array('index'),
	'Update Master Tariffs',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>