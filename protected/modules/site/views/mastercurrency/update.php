<?php
/* @var $this MastercurrencyController */
/* @var $model MasterCurrency */

$this->title = 'Update Master Currency: ' . $model->Currency_Name;
$this->breadcrumbs = array(
    'Master Currencies' => array('index'),
    'Update Master Currencies',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>