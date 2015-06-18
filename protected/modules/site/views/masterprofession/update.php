<?php
/* @var $this MasterprofessionController */
/* @var $model MasterProfession */

$this->title = 'Update Master Profession: ' . $model->Profession_Name;
$this->breadcrumbs = array(
    'Master Professions' => array('index'),
    'Update Master Professions',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>