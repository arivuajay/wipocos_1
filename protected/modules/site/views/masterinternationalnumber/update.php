<?php
/* @var $this MasterinternationalnumberController */
/* @var $model MasterInternationalNumber */

$this->title = 'Update Master International Numbers: ' . $model->Master_International_Id;
$this->breadcrumbs = array(
    'Master International Numbers' => array('index'),
    'Update Master International Numbers',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>