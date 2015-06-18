<?php
/* @var $this MasterlanguageController */
/* @var $model MasterLanguage */

$this->title = 'Update Master Language: ' . $model->Lang_Name;
$this->breadcrumbs = array(
    'Master Languages' => array('index'),
    'Update Master Languages',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>