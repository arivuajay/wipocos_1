<?php
/* @var $this MasterlegalformController */
/* @var $model MasterLegalForm */

$this->title = 'Update Master Legal Form: ' . $model->Legal_Form_Name;
$this->breadcrumbs = array(
    'Master Legal Forms' => array('index'),
    'Update Master Legal Forms',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>