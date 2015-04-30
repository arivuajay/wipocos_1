<?php
/* @var $this MasterlegalformController */
/* @var $model MasterLegalForm */

$this->title = 'Update Master Legal Forms: ' . $model->Master_Legal_Form_Id;
$this->breadcrumbs = array(
    'Master Legal Forms' => array('index'),
    'Update Master Legal Forms',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>