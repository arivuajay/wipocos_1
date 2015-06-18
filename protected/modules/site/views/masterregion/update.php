<?php
/* @var $this MasterregionController */
/* @var $model MasterRegion */

$this->title = 'Update Master Region: ' . $model->Region_Name;
$this->breadcrumbs = array(
    'Master Regions' => array('index'),
    'Update Master Regions',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>