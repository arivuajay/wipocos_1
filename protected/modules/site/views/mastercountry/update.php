<?php
/* @var $this MastercountryController */
/* @var $model MasterCountry */

$this->title = 'Update Master Country: ' . $model->Country_Name;
$this->breadcrumbs = array(
    'Master Countries' => array('index'),
    'Update Master Countries',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>