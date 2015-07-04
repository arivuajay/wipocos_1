<?php
/* @var $this MastermanufacturerController */
/* @var $model MasterManufacturer */

$this->title='Update Master Manufacturers: '. $model->Master_Manf_Id;
$this->breadcrumbs=array(
	'Master Manufacturers'=>array('index'),
	'Update Master Manufacturers',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>