<?php
/* @var $this MasterterritoriesController */
/* @var $model MasterTerritories */

$this->title = 'Update Master Territories: ' . $model->Master_Territory_Id;
$this->breadcrumbs = array(
    'Master Territories' => array('index'),
    'Update Master Territories',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>