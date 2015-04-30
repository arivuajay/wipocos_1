<?php
/* @var $this MasterpaymentmethodController */
/* @var $model MasterPaymentMethod */

$this->title = 'Update Master Payment Methods: ' . $model->Master_Paymode_Id;
$this->breadcrumbs = array(
    'Master Payment Methods' => array('index'),
    'Update Master Payment Methods',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>