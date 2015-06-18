<?php
/* @var $this MasterinternationalnumberController */
/* @var $model MasterInternationalNumber */

$this->title = 'Update Master International Number: ' . $model->International_Number_Type;
$this->breadcrumbs = array(
    'Master International Numbers' => array('index'),
    'Update Master International Numbers',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>