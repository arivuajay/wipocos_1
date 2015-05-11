<?php
/* @var $this MastertyperightsController */
/* @var $model MasterTypeRights */

$this->title = 'Update Right Holder Type: ' . $model->Master_Type_Rights_Id;
$this->breadcrumbs = array(
    'Right Holder Types' => array('index'),
    'Update Right Holder Type',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>