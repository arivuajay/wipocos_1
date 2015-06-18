<?php
/* @var $this MasternationalityController */
/* @var $model MasterNationality */

$this->title = 'Update Master Nationality: ' . $model->Nation_Name;
$this->breadcrumbs = array(
    'Master Nationalities' => array('index'),
    'Update Master Nationalities',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>