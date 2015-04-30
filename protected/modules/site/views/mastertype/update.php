<?php
/* @var $this MastertypeController */
/* @var $model MasterType */

$this->title = 'Update Master Types: ' . $model->Master_Type_Id;
$this->breadcrumbs = array(
    'Master Types' => array('index'),
    'Update Master Types',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>