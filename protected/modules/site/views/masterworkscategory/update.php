<?php
/* @var $this MasterworkscategoryController */
/* @var $model MasterWorksCategory */

$this->title = 'Update Master Works Category: ' . $model->Work_Category_Name;
$this->breadcrumbs = array(
    'Master Works Categories' => array('index'),
    'Update Master Works Categories',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>