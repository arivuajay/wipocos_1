<?php
/* @var $this MastermaritalstatusController */
/* @var $model MasterMaritalStatus */

$this->title = 'Update Master Marital Statuses: ' . $model->Master_Marital_State_Id;
$this->breadcrumbs = array(
    'Master Marital Statuses' => array('index'),
    'Update Master Marital Statuses',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>