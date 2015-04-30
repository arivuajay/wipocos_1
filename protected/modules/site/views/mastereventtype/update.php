<?php
/* @var $this MastereventtypeController */
/* @var $model MasterEventType */

$this->title = 'Update Master Event Types: ' . $model->Master_Evt_Type_Id;
$this->breadcrumbs = array(
    'Master Event Types' => array('index'),
    'Update Master Event Types',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>